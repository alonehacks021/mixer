<?php

Route::namespace('Nahad\Foundation\Dashboard\Http\Controllers')
    ->middleware('web', 'auth')
    ->prefix('/dashboard')
    ->group(function() {
        Route::get('/', 'DashboardController@index');
        Route::post('/handle-bookmark', 'DashboardController@handleBookmark');
        Route::get('/remove-bookmark/{id}', 'DashboardController@removeBookmark');

        Route::get('download-report', 'ReportController@download');

        Route::get('scanner', 'ScannerController@index')
            ->name('dashboard.scanner');
    });