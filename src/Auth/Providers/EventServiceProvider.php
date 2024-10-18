<?php

namespace Nahad\Foundation\Auth\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Nahad\Foundation\Auth\Events\DashboardLoginFail;
use Nahad\Foundation\Auth\Listeners\DashboardLoginFailListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DashboardLoginFail::class => [
            DashboardLoginFailListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
