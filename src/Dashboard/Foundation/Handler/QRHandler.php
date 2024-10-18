<?php

namespace Nahad\Dashboard\Foundation\Handler;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

abstract class QRHandler
{
    abstract public function handle($data): array|Redirector|RedirectResponse|View|Factory;

    public function fail(string $message): array
    {
        return [
            'type' => 'error',
            'message' => $message,
        ];
    }

    public function success(string $message): array
    {
        return [
            'type' => 'success',
            'message' => $message,
        ];
    }

    public function livewire(string $component, array $data = []): array
    {
        return [
            'type' => 'livewire',
            'component' => $component,
            'data' => $data,
        ];
    }
}
