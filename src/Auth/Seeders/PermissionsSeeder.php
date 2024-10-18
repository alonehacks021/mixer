<?php

namespace Nahad\Auth\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Foundation\Auth\Models\Permission;
use Nahad\Foundation\Auth\Models\Role;
use Nahad\Foundation\Auth\Models\User;

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
            ['namespace' => 'auth_users', 'name' => 'users', 'nick_name' => 'کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_all', 'nick_name' => 'دسترسی به تمامی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_show', 'nick_name' => 'نمایش کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_show_all', 'nick_name' => 'نمایش همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_create', 'nick_name' => 'ایجاد کاربر جدید'],
            ['namespace' => 'auth_users', 'name' => 'users_create_admin', 'nick_name' => 'ایجاد کاربر ادمین'],
            ['namespace' => 'auth_users', 'name' => 'users_update', 'nick_name' => 'بروزرسانی کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_update_all', 'nick_name' => 'بروزرسانی همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_update_roles', 'nick_name' => 'بروزرسانی نقش های کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_update_roles_all', 'nick_name' => 'بروزرسانی نقش های همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_change_status', 'nick_name' => 'تغییر وضعیت کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_change_type', 'nick_name' => 'تغییر نوع کاربری'],
            ['namespace' => 'auth_users', 'name' => 'users_delete', 'nick_name' => 'حذف کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_delete_all', 'nick_name' => 'حذف همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_select2_list', 'nick_name' => 'لیست کاربران select2'],
            ['namespace' => 'auth_users', 'name' => 'users_select2_list_all', 'nick_name' => 'لیست همه ی کاربران select2'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens', 'nick_name' => 'توکن های دسترسی'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens_all', 'nick_name' => 'توکن های دسترسی همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens_create', 'nick_name' => 'ایجاد توکن دسترسی'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens_create_all', 'nick_name' => 'ایجاد توکن دسترسی برای همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens_delete', 'nick_name' => 'حذف توکن دسترسی'],
            ['namespace' => 'auth_users', 'name' => 'users_tokens_delete_all', 'nick_name' => 'حذف توکن دسترسی برای همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_image', 'nick_name' => 'تصویر کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_image_all', 'nick_name' => 'تصویر همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_2fa', 'nick_name' => 'سوابق احراز هویست'],
            ['namespace' => 'auth_users', 'name' => 'users_2fa_all', 'nick_name' => 'سوابق احراز هویست تمامی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_sessions', 'nick_name' => 'نشست های کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_sessions_all', 'nick_name' => 'نشست های همه ی کاربران'],
            ['namespace' => 'auth_users', 'name' => 'users_sessions_delete', 'nick_name' => 'حذف نشست کاربر'],
            ['namespace' => 'auth_users', 'name' => 'users_sessions_delete_all', 'nick_name' => 'حذف نشست های همه ی کاربران'],

            ['namespace' => 'auth_users_api', 'name' => 'users_api_external_login', 'nick_name' => 'ایجاد کد برای login خارجی'],
            
            ['namespace' => 'auth_roles', 'name' => 'roles', 'nick_name' => 'نقش ها'],
            ['namespace' => 'auth_roles', 'name' => 'roles_all', 'nick_name' => 'دسترسی به تمامی نقش ها'],
            ['namespace' => 'auth_roles', 'name' => 'roles_create', 'nick_name' => 'افزودن نقش'],
            ['namespace' => 'auth_roles', 'name' => 'roles_update', 'nick_name' => 'بروزرسانی نقش'],
            ['namespace' => 'auth_roles', 'name' => 'roles_update_all', 'nick_name' => 'بروزرسانی همهی نقش ها'],
            ['namespace' => 'auth_roles', 'name' => 'roles_delete', 'nick_name' => 'حذف نقش'],
            ['namespace' => 'auth_roles', 'name' => 'roles_delete_all', 'nick_name' => 'حذف همه ی نقش ها'],
            ['namespace' => 'auth_roles', 'name' => 'roles_permissions', 'nick_name' => 'بروزرسانی دسترسی های نقش'],
            ['namespace' => 'auth_roles', 'name' => 'roles_permissions_all', 'nick_name' => 'بروزرسانی دسترسی های همه ی نقش ها'],
            ['namespace' => 'auth_roles', 'name' => 'roles_select2_list', 'nick_name' => 'لیست نقش ها select2'],
            ['namespace' => 'auth_roles', 'name' => 'roles_select2_list_all', 'nick_name' => 'لیست همه ی نقش ها select2'],

            ['namespace' => 'auth_settings', 'name' => 'settings_defaults', 'nick_name' => 'تنظیمات پیشفرض سیستم کاربری'],

            ['namespace' => 'auth_sessions', 'name' => 'sessions', 'nick_name' => 'نقش ها'],
            ['namespace' => 'auth_sessions', 'name' => 'sessions_terminate_all', 'nick_name' => 'پایان همه ی نشست ها'],
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
            'name' => 'مدیریت کاربران'
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
