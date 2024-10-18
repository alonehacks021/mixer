<?php

use Nahad\Auth\Models\User;

return [
    'user_statuses' => [
        User::STATUS_ACTIVE => 'فعال',
        User::STATUS_BAN => 'مسدود'
    ],
    'user_types' => [
        User::TYPE_USER => 'کاربر عادی',
        User::TYPE_TEMP => 'کاربر موقت',
        User::TYPE_ADMIN => 'مدیر',
    ],
    'user_genders' => [
        User::GENDER_MALE => 'آقا',
        User::GENDER_FEMALE => 'خانم'
    ],
    'user_genders_adjective' => [
        User::GENDER_MALE => 'جناب آقای',
        User::GENDER_FEMALE => 'سرکار خانم'
    ],
];