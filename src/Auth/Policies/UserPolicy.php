<?php

namespace Nahad\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Models\UserChange;
use Nahad\Foundation\Auth\Services\AccessService;

class UserPolicy
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

    public function before(User $user, $ability) {
        if($user->isAdmin() && !in_array($ability, ['delete', 'updateRoles', 'tokens', 'tokenCreate', 'tokenDelete'])) {
            return true;
        }
    }

    public function users($user) {
        return AccessService::can($user->id, 'users');
    }

    public function usersAll($user) {
        return AccessService::can($user->id, 'users_all');
    }

    public function create($user) {
        return AccessService::can($user->id, 'users_create');
    }

    public function createAdmin($user) {
        return AccessService::can($user->id, 'users_create_admin');
    }

    public function show($user, $target) {
        return AccessService::can($user->id, 'users_show') &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_show_all'));
    }

    public function update($user, $target) {
        return AccessService::can($user->id, 'users_update') &&
            //(!$target->ldap_login) &&
            ($user->isAdmin() || ($user->id == $target->owner_id) || AccessService::can($user->id, 'users_update_all'));
    }

    public function delete($user, $target) {
        return $target->isAdmin() && (
            $user->isAdmin() ||
            (
                AccessService::can($user->id, 'users_update_delete') &&
                (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_update_delete_all'))
            )
        );
    }

    public function _2fa($user, $target) {
        return AccessService::can($user->id, 'users_2fa') &&
            //(!$target->ldap_login) &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_2fa_all'));
    }

    public function sessions($user, $target) {
        return AccessService::can($user->id, 'users_sessions') &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_sessions_all'));
    }

    public function sessionsDelete($user, $target) {
        return AccessService::can($user->id, 'users_sessions_delete') &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_sessions_delete_all'));
    }

    public function image($user, $target) {
        return ($user->id == $target->id) || (
            AccessService::can($user->id, 'users_image') &&
                (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_image_all'))
        );
    }

    public function changeStatus($user, $target) {
        return AccessService::can($user->id, 'users_change_status') &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_update_all'));
    }

    public function changeType($user, $target) {
        return AccessService::can($user->id, 'users_change_type') &&
            (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_update_all'));
    }

    public function updateRoles($user, $target) {
        return (!$target->isAdmin()) && (
            $user->isAdmin() ||
            (
                AccessService::can($user->id, 'users_update_roles') &&
                (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_update_roles_all'))
            )
        );
    }

    public function select2List($user) {
        return AccessService::can($user->id, 'users_select2_list');
    }

    public function select2ListAll($user) {
        return AccessService::can($user->id, 'users_select2_list_all');
    }

    public function tokens($user, $target) {
        return $target->isUser() && (
                $user->isAdmin() || (
                    AccessService::can($user->id, 'users_tokens') &&
                        (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_tokens_all'))
                )
            );
    }

    public function tokenCreate($user, $target) {
        return $target->isUser() && (
                $user->isAdmin() || (
                    AccessService::can($user->id, 'users_tokens_create') &&
                        (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_tokens_create_all'))
                )
            );
    }

    public function tokenDelete($user, $target) {
        return $target->isUser() && (
                $user->isAdmin() || (
                    AccessService::can($user->id, 'users_tokens_delete') &&
                        (($user->id == $target->owner_id) || AccessService::can($user->id, 'users_tokens_delete_all'))
                )
            );
    }

    public function externalLogin($user) {
        return AccessService::can($user->id, 'users_api_external_login');
    }

    public function account(User $user, ?User $target = null) {
        return (config('auth.check_complete_profile') || config('auth.check_gender')) && (is_null($target) || ($user->id == $target->id));
    }
}
