<?php
namespace Nahad\Foundation;

use Illuminate\Support\ServiceProvider;

class FoundationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('foundation', function () {
            return new Foundation;
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php'); 
        $this->loadRoutesFrom(__DIR__ . '/Auth/routes/auth.php');
    }
}
