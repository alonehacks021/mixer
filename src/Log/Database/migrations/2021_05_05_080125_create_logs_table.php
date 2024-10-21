<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('RESTRICT');
            $table->foreignId('type_id')
                ->constrained('log_types')
                ->onDelete('RESTRICT');
            $table->nullableMorphs('loggable');
            $table->string('path', 2048);
            $table->string('method', 7)
                ->nullable();
            $table->json('data')
                ->nullable();
            $table->dateTime('logged_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
