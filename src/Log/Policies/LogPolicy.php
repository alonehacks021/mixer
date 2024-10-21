<?php

namespace Nahad\Foundation\Log\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;
use Nahad\Foundation\Log\Models\LogAlert;

class LogPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability) {
        if($user->isAdmin() && !in_array($ability, ['alertsDone'])) {
            return true;
        }
    }

    public function logs(User $user) {
        return AccessService::can($user->id, 'log_list');
    }

    public function settings(User $user) {
        return AccessService::can($user->id, 'log_settings');
    }

    public function alerts(User $user) {
        return AccessService::can($user->id, 'log_alerts');
    }

    public function alertsDone(User $user, LogAlert $logAlert) {
        return (!$logAlert->done) && ($user->isAdmin() || AccessService::can($user->id, 'log_alerts_done'));
    }
}
