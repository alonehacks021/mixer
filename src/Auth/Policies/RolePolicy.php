<?php

namespace Nahad\Foundation\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Services\AccessService;

class RolePolicy
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

    public function roles($user) {
        return AccessService::can($user->id, 'roles');
    }

    public function rolesAll($user) {
        return AccessService::can($user->id, 'roles_all');
    }

    public function create($user) {
        return AccessService::can($user->id, 'roles_create');
    }

    public function update($user, $target) {
        return AccessService::can($user->id, 'roles_update') &&
            ($user->id == $target->owner_id || AccessService::can($user->id, 'roles_update_all'));
    }

    public function delete($user, $target) {
        return AccessService::can($user->id, 'roles_delete') &&
            ($user->id == $target->owner_id || AccessService::can($user->id, 'roles_delete_all'));
    }

    public function updatePermissions($user, $target) {
        return AccessService::can($user->id, 'roles_permissions') &&
            ($user->id == $target->owner_id || AccessService::can($user->id, 'roles_permissions_all'));
    }

    public function select2List($user) {
        return AccessService::can($user->id, 'roles_select2_list');
    }

    public function select2ListAll($user) {
        return AccessService::can($user->id, 'roles_select2_list_all');
    }
}
