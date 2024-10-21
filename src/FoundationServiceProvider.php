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
        $this->mergeConfigFrom(__DIR__ . '/Dashboard/config/config.php', 'dashboard');
        $this->mergeConfigFrom(__DIR__ . '/Log/config/log.php', 'log'); // Load log configuration
    }

    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        $this->loadRoutesFrom(__DIR__ . '/Auth/routes/auth.php');
        $this->loadRoutesFrom(__DIR__ . '/Auth/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/Dashboard/routes/web.php'); // Load dashboard web routes
        $this->loadRoutesFrom(__DIR__ . '/Log/routes/web.php'); // Load log web routes

        // Load views
        $this->loadViewsFrom(__DIR__ . '/Auth/resources/views', 'auth');
        $this->loadViewsFrom(__DIR__ . '/Dashboard/resources/views', 'dashboard'); // Load dashboard views
        $this->loadViewsFrom(__DIR__ . '/Log/resources/views', 'log'); // Load log views

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/Auth/Database/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/Dashboard/Database/migrations'); // Load dashboard migrations
        $this->loadMigrationsFrom(__DIR__ . '/Log/Database/migrations'); // Load log migrations

        // Load translations (if any)
        $this->loadTranslationsFrom(__DIR__ . '/Auth/resources/lang', 'auth');
        $this->loadTranslationsFrom(__DIR__ . '/Dashboard/resources/lang', 'dashboard'); // Load dashboard translations
        $this->loadTranslationsFrom(__DIR__ . '/Log/resources/lang', 'log'); // Load log translations

        // Publish resources
        $this->publishes([
            __DIR__ . '/Auth/Config/auth.php' => config_path('auth.php'),
            __DIR__ . '/Dashboard/Config/config.php' => config_path('dashboard.php'), // Publish dashboard config
            __DIR__ . '/Log/config/log.php' => config_path('log.php'), // Publish log config

            __DIR__ . '/Auth/resources/views' => resource_path('views/vendor/auth'),
            __DIR__ . '/Dashboard/resources/views' => resource_path('views/vendor/dashboard'), // Publish dashboard views
            __DIR__ . '/Log/resources/views' => resource_path('views/vendor/log'), // Publish log views

            __DIR__ . '/Auth/Database/migrations' => database_path('migrations'),
            __DIR__ . '/Dashboard/Database/migrations' => database_path('migrations'), // Publish dashboard migrations
            __DIR__ . '/Log/Database/migrations' => database_path('migrations'), // Publish log migrations
        ], 'foundation');
    }
}