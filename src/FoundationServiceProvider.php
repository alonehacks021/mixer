<?php

namespace Nahad\Foundation;

use Illuminate\Support\ServiceProvider;

class FoundationServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the foundation instance
        $this->app->bind('foundation', function () {
            return new Foundation;
        });

        // Load configuration files
        $this->mergeConfigFrom(__DIR__ . '/Auth/Config/auth.php', 'auth'); 
    }

    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php'); 
        $this->loadRoutesFrom(__DIR__ . '/Auth/routes/auth.php');
        $this->loadRoutesFrom(__DIR__ . '/Auth/routes/api.php'); 

        // Load views
        $this->loadViewsFrom(__DIR__ . '/Auth/resources/views', 'auth'); 

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/Auth/database/migrations');

        // Load translations (if any)
        $this->loadTranslationsFrom(__DIR__ . '/Auth/resources/lang', 'auth'); 

        $this->publishes([
            __DIR__ . '/Auth/Config/auth.php' => config_path('auth.php'),
            __DIR__ . '/Auth/resources/views' => resource_path('views/vendor/auth'),
            __DIR__ . '/Auth/database/migrations' => database_path('migrations'),
        ], 'foundation');
    }
}
