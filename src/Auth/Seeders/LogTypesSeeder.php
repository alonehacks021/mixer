<?php

namespace Nahad\Foundation\Auth\Seeders;

use Illuminate\Database\Seeder;

use Nahad\Foundation\Log\Models\LogType;

class LogTypesSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'login-dashboard', 'title' => 'ورود کاربر به مدیریت'],
            ['name' => 'login', 'title' => 'ورود کاربر'],
            //['name' => '', 'title' => ''],
        ];

        foreach($types as $type) {
            LogType::updateOrCreate([
                'name' => $type['name']
            ], [
                'title' => $type['title']
            ]);

        }
    }
}
