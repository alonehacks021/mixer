<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationalPostRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizational_post_roles', function (Blueprint $table) {
            $table->foreignId('organizational_post_id')
                ->constrained('organizational_posts')
                ->onDelete('CASCADE');
            $table->foreignId('role_id')
                ->constrained('roles')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizational_post_roles');
    }
}
