<?php

namespace Nahad\Foundation\Log\Seeders;

use Illuminate\Database\Seeder;

use Nahad\Foundation\Log\Models\LogType;

class LogPackageSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionsSeeder::class);
    }
}
