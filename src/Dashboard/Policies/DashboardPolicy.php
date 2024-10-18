<?php

namespace Nahad\Foundation\Dashboard\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;

class DashboardPolicy
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

    public function dashboard($user) {
        return AccessService::can($user->id, 'dashboard');
    }

    public function dashboardContent($user) {
        return AccessService::can($user->id, 'dashboard_content');
    }

    public function scanner($user) {
        return AccessService::can($user->id, 'dashboard_scanner');
    }
}
