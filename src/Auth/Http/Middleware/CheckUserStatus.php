<?php

namespace Nahad\Foundation\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nahad\Foundation\Auth\Models\User;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if($user && ($user->status == User::STATUS_BAN)) {
            return abort(403);
        }

        return $next($request);
    }
}
