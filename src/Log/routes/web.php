<?php

Route::namespace('Nahad\Foundation\Log\Http\Controllers')
->middleware('web', 'auth')
->prefix('/dashboard/log')
->group(function() {
    Route::resource('logs', 'LogController')
        ->only('index');

    Route::resource('log-alerts', 'LogAlertController')
        ->only('index');

    Route::get('log-alerts/done/{log_alert}', 'LogAlertController@done')->name('log-alerts.done');

    Route::resource('settings', 'SettingsController')
        ->only('index', 'store');
});