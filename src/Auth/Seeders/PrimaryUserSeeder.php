<?php

namespace Nahad\Auth\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Foundation\Auth\Events\UserCreated;
use Nahad\Foundation\Auth\Models\User;

class PrimaryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'username' => 'admin'
        ], [
            'first_name' => 'مدیر',
            'last_name' => 'پیشفرض',
            'mobile' => '09121231212',
            'gender' => User::GENDER_MALE,
            'status' => User::STATUS_ACTIVE,
            'type' => User::TYPE_ADMIN,
            'email' => 'admin@nahad.ir',
            'password' => bcrypt('11111111'),
        ]);

        UserCreated::dispatch($user);
    }
}
