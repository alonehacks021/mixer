<?php

namespace Nahad\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;

class SessionPolicy
{
    public function before(User $user) {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function sessions($user) {
        return AccessService::can($user->id, 'sessions');
    }

    public function terminateAll($user) {
        return AccessService::can($user->id, 'sessions_terminate_all');
    }
}
