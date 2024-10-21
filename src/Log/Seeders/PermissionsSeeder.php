<?php

namespace Nahad\Log\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Auth\Models\Permission;
use Nahad\Auth\Models\Role;
use Nahad\Auth\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['namespace' => 'log_list', 'name' => 'users', 'nick_name' => 'تاریخچه فعالیت ها'],

            ['namespace' => 'log_settings', 'name' => 'settings_defaults', 'nick_name' => 'تنظیمات سیستم لاگ'],
            //['name' => '', 'nick_name' => ''],
        ];

        $permissionsIds = [];
        foreach($permissions as $permission) {
            $permission = Permission::updateOrCreate([
                'name' => $permission['name']
            ], [
                'nick_name' => $permission['nick_name'],
                'namespace' => $permission['namespace'],
                'order' => $permission['order'] ?? 1
            ]);

            $permissionsIds[] = $permission->id;
        }

        $admin = User::where('username', 'admin')->first();
        $role = Role::updateOrCreate([
            'name' => 'مدیریت لاگ'
        ], [
            'owner_id' => $admin->id 
        ]);

        $rolePermissions = array_map(function($permissionId) use ($role) {
            return [
                'role_id' => $role->id,
                'permission_id' => $permissionId
            ];
        }, $permissionsIds);

        $role->rolePermissions()->delete();
        $role->rolePermissions()->insert($rolePermissions);
    }
}
