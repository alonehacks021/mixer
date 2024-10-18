<?php

namespace Nahad\Foundation\Dashboard\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Foundation\Auth\Models\Permission;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Models\Role;

class DashboardPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
    }
}
