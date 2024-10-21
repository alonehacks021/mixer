<?php

namespace Nahad\Foundation\Log\Handlers;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Nahad\Foundation\Log\Services\LogService;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Str;
use Nahad\Foundation\Log\Models\Log;
use Nahad\Foundation\Log\Models\LogAlert;
use Nahad\Foundation\Notification\Services\NotificationService;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Nahad\Foundation\Auth\Models\User;

class LocalExceptionHandler extends ExceptionHandler
{
    private $ignoreExceptions = [
        ValidationException::class,
        AuthenticationException::class,
        UnauthorizedException::class,
        ModelNotFoundException::class,
        AuthorizationException::class,
        TokenMismatchException::class,
    ];

    // Override the "report" method to handle the exception logging
    public function report(Throwable $exception)
    {
        parent::report($exception);

        $log = null;

        if(in_array($exception::class, $this->ignoreExceptions)) {
            return;
        }

        $isNotFound = $exception instanceof NotFoundHttpException;

        if($isNotFound) {
            $log = LogService::activity('not-found', 'File not found');
        }
        else {
            $log = LogService::activity('exception', 'Exception');
        }

        $message = $exception->getMessage();

        $log = $log->withData(request()->query())
            ->setMessage($message)
            ->setTrace(
                collect($exception->getTrace())
                    ->filter(
                        fn($item) => (!Str::contains($item['file'] ?? '', ['vendor'])) && (!Str::contains($item['file'] ?? '', ['vendor/nahad']))
                    )
                    ->take(3)
                    ->map(fn($item) => [
                        'file' => $item['file'] ?? '', 
                        'line' => $item['line'] ?? 0, 
                        'function' => $item['function'] ?? '---'
                    ])
                    ->toArray()
            )
            ->log();

        if(!$isNotFound) {
            $this->alert($log, $message);
        }
    }

    private function alert(Log $log, string $message) {
        $hash = md5("{$log->type_id}:{$log->address}:{$message}");

        $logAlert = LogAlert::where('hash', $hash)->first();

        if(
            LogService::isActiveLogExceptionAlert() &&
            (
                (!$logAlert) || ($logAlert && $logAlert->done)
            )
        ) {
            $users = User::whereIn('id', get_option_array('log_alert_users', []))
                ->get();

            $app = env('APP_NAME');

            if($users->count() > 0) {
                NotificationService::notifyToUsers($users, 'هشدار', "Exception ocurred!; {$app}; Message: {$message}; Address: {$log->path}");
            }
        }

        if(!$logAlert) {
            $logAlert = LogAlert::create([
                'hash' => $hash,
                'done' => false
            ]);
        }
        else {
            $logAlert->update([
                'done' => false,
            ]);
        }

        $logAlert->logs()->attach($log);
    }
}