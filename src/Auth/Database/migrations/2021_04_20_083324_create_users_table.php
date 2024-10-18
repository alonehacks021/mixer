<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nahad\Auth\Models\User;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id')
                ->nullable();
            $table->string('username')
                ->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->unsignedTinyInteger('status');
            $table->unsignedTinyInteger('type')
                ->default(User::TYPE_USER);
            $table->unsignedTinyInteger('gender')
                ->nullable();
            $table->string('email')
                ->nullable();
            $table->string('mobile', 11)
                ->unique();
            $table->string('password');
            $table->string('image', 255)
                ->nullable();
            $table->boolean('ldap_login')
                ->default(false)
                ->index();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
