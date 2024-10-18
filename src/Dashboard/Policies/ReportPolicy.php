<?php

namespace Nahad\Foundation\Dashboard\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;

class ReportPolicy
{
    use HandlesAuthorization;

    public function before(User $user) {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function handle($user, $model) {
        return AccessService::can($user->id, $model);
    }
}
