<?php

namespace Nahad\Foundation\Dashboard\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Foundation\Auth\Models\Permission;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Models\Role;

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
            ['namespace' => 'dashboard', 'name' => 'dashboard', 'nick_name' => 'پیشخوان مدیریتی'],
            ['namespace' => 'dashboard', 'name' => 'dashboard_content', 'nick_name' => 'محتوای صفحه اصلی پیشخوان'],

            ['namespace' => 'dashboard_bookmarks', 'name' => 'dashboard_bookmarks_handle', 'nick_name' => 'افزودن و حذف نشانه گزاری'],

            ['namespace' => 'dashboard_tools', 'name' => 'dashboard_scanner', 'nick_name' => 'پویشگر رمزینه'],
            
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
            'name' => 'مدیریت پیشخوان'
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
