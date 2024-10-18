<?php

namespace Nahad\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;

class SettingsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user) {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function defaults($user) {
        return AccessService::can($user->id, 'settings_defaults');
    }
}
