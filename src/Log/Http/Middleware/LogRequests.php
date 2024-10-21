<?php

namespace Nahad\Foundation\Log\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Nahad\Foundation\Log\Services\LogService;

class LogRequests
{
    public function handle(Request $request, Closure $next)
    {
        if(LogService::isActiveLogRequests()) {
            $logRequest = true;

            foreach(config('log.ignore_paths') as $path) {
                if($request->is($path)) {
                    $logRequest = false;
                }
            }

            if($logRequest) {
                $log = LogService::activity('request')
                    ->withData($request->query());

                if($request->is('livewire/update*')) {
                    $data = json_decode($request->all()['components'][0]['snapshot'] ?? '{}');
        
                    $log = $log->setPath(($data->memo->path ?? null) . ' [' . ($data->memo->name ?? null) . ']');
                }
                    
                $log->log();
            }
        }

        return $next($request);
    }
}
