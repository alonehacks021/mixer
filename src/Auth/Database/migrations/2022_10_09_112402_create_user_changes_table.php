<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_changes', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('CASCADE');
            $table->unsignedTinyInteger('type');
            $table->dateTime('created_at');

            $table->unique(['user_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_changes');
    }
}
