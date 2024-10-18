<?php

namespace Nahad\Foundation\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Dashboard\Support\Alert;

class CheckCompleteAccount
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if($user && config('auth.check_complete_profile')) {
            if(
                (!$user->isAdmin()) &&
                (empty($user->birthday) || empty($user->gender)) &&
                (!request()->is('auth/account') && !request()->is('livewire/*'))
                ) {
                    Alert::add('برای ادامه کار می بایست حساب کاربری خود را تکمیل نمایید', Alert::WARNING);

                    return redirect()->route('auth-account');
            }
        }

        return $next($request);
    }
}
