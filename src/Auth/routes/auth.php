<?php

use Nahad\Foundation\Auth\Http\Middleware\EmergencyLoginHandle;
use Nahad\Foundation\Auth\Http\Controllers\Client\AuthController;
use Nahad\Foundation\Auth\Http\Controllers\Client\EmergencyAuthController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\UserController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\RoleController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\SessionController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\SettingsController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\UserSessionController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\UserTokenController;
use Nahad\Foundation\Auth\Http\Controllers\Dashboard\User2FAController;
use Nahad\Foundation\Auth\Http\Controllers\Api\Dashboard\CredentialController;

Route::namespace('Nahad\Foundation\Auth\Http\Controllers')
    ->middleware('web')
    ->group(function() {
        Route::get('application-login', [AuthController::class, 'application']);

        Route::resource('emergency-login', EmergencyAuthController::class)
            ->only(['index', 'store'])
            ->middleware(EmergencyLoginHandle::class);

        // Dashboard Routes
        Route::namespace('Dashboard')
            ->prefix('dashboard/auth')
            ->group(function() {
                Route::get('login', [AuthController::class, 'loginGet'])->name('login');
                Route::post('login', [AuthController::class, 'loginPost']);
                Route::get('logout', [AuthController::class, 'logout']);
                Route::get('verify/{hashCode}', [AuthController::class, 'verifyGet']);

                Route::middleware('auth')->group(function() {
                    Route::resource('users', UserController::class);
                    Route::get('users/destroy/{user}', [UserController::class, 'destroy']);
                    Route::get('users/roles/{user}', [UserController::class, 'rolesGet']);
                    Route::post('users/roles/{user}', [UserController::class, 'rolesPost']);
                    Route::get('users/tokens/{user}', [UserTokenController::class, 'tokens']);
                    Route::post('users/tokens/generate/{user}', [UserTokenController::class, 'generate']);
                    Route::get('users/tokens/destroy/{user}/{token_id}', [UserTokenController::class, 'destroy']);
                    
                    Route::resource('users.user-2fa', User2FAController::class)->shallow();

                    Route::resource('users.sessions', UserSessionController::class)
                        ->only('index')
                        ->shallow();
                    Route::get('user-sessions/{session}', [UserSessionController::class, 'destroy'])
                        ->name('user-sessions.destroy');

                    Route::resource('sessions', SessionController::class)->only('index');
                    Route::get('sessions/terminate-all-sessions', [SessionController::class, 'terminateAll'])
                        ->name('terminate-all-sessions');

                    Route::resource('roles', RoleController::class);
                    Route::get('roles/permissions/{role}', [RoleController::class, 'permissionsGet']);
                    Route::post('roles/permissions/{role}', [RoleController::class, 'permissionsPost']);
                    Route::get('roles/destroy/{role}', [RoleController::class, 'destroy']);

                    Route::get('settings/defaults', [SettingsController::class, 'defaultsGet']);
                    Route::post('settings/defaults', [SettingsController::class, 'defaultsPost']);
                });
            });

        // API Dashboard Routes
        Route::namespace('Api\Dashboard')
            ->prefix('/dashboard/ajax/auth')
            ->middleware('auth')
            ->group(function() {
                Route::get('users-select2', [UserController::class, 'usersSelect2']);
                Route::get('roles-select2', [RoleController::class, 'rolesSelect2']);
                Route::get('credential-check', [CredentialController::class, 'check']);
            });

        // Client Routes
        Route::prefix('auth')
            ->namespace('Client')
            ->group(function() {
                Route::get('reset-password', [AuthController::class, 'resetPassword']);
                Route::get('verify', [AuthController::class, 'verify'])->name('verify-user');
                Route::get('logout', [AuthController::class, 'logout']);

                Route::middleware('auth')->group(function() {
                    Route::get('files/user-image/{user}', 'FileController@userImage');
                    Route::get('account', [AuthController::class, 'account'])->name('auth-account');
                });
            });
    });

Route::get('forward-login', [AuthController::class, 'forward']);
Route::get('user-banned', [AuthController::class, 'userBanned'])->name('user-banned');
