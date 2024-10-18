<?php

namespace Nahad\Foundation\Auth\Services;

use Nahad\Foundation\Auth\Models\RolePermission;
use Nahad\Foundation\Auth\Models\UserRole;

class AccessService {
    private static $permissions = null;
    public static function can($userId, $permission) {
        if(!isset(self::$permissions[$userId])) {
            self::$permissions[$userId] = self::userPermissions(
                self::userRoles($userId)
            );
        }

        return in_array($permission, self::$permissions[$userId]);
    }

    public static function userRoles($userId) {
        return UserRole::select('role_id')
            ->has('role')
            ->where('user_id', $userId)
            ->pluck('role_id')
            ->toArray();
    }

    public static function userPermissions($roles) {
        return RolePermission::join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->select('permissions.name')
            ->distinct()
            ->whereIn('role_id', $roles)
            ->pluck('permissions.name')
            ->toArray();
    }
}