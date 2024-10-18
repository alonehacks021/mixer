<?php

Route::namespace('Nahad\Foundation\Auth\Http\Controllers\Api\Client')
    ->prefix('api/auth')
    ->middleware('auth:sanctum')
    ->group(function() {
        Route::post('external-login', 'AuthController@externalLogin');
    });