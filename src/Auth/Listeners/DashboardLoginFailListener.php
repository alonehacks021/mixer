<?php

namespace Nahad\Foundation\Auth\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Nahad\Foundation\Auth\Events\DashboardLoginFail;
use Nahad\Foundation\Log\Services\LogService;

class DashboardLoginFailListener
{
    public function handle(DashboardLoginFail $event): void
    {
        $cache = cache()->driver('database');

        $attempts = $cache->get("failed-login:{$event->username}");
        if(!$attempts) {
            $cache->put("failed-login:{$event->username}", 1, 86400);
        }
        else {
            $cache->increment("failed-login:{$event->username}");
        }

        LogService::activity('login-fail', 'ورود ناموفق')
            ->byUser($event->user)
            ->withData([
                'username' => $event->username
            ])
            ->log();
    }
}
