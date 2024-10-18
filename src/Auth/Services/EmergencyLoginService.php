<?php

namespace Nahad\Foundation\Auth\Services;

use Nahad\Foundation\Auth\Models\User;

class EmergencyLoginService {
    public static function useMaxAttempts(string $username): bool {
        return cache()->driver('database')->remember("el-{$username}", 86400, function() {
            return 0;
        }) >= config('auth.emergency_login_max_attempts_per_day', 1);
    }

    public static function check(string $username, string $mobile): User|null {
        $user = User::select('id', 'username', 'mobile', 'status', 'type')
            ->where([
                'username' => $username,
                'mobile' => $mobile,
                'status' => User::STATUS_ACTIVE,
                'type' => User::TYPE_USER
            ])->first();

        cache()->driver('database')->increment("el-{$username}");

        return $user;
    }
}