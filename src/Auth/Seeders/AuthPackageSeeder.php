<?php

namespace Nahad\Foundation\Auth\Seeders;

use Illuminate\Database\Seeder;

class AuthPackageSeeder extends Seeder
{
    public function run()
    {
        $this->call(PrimaryUserSeeder::class);
        $this->call(PermissionsSeeder::class);
        // $this->call(LogTypesSeeder::class);
        $this->call(OrganizationalPostsSeeder::class);
    }
}
