<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_messages', function (Blueprint $table) {
            $table->foreignId('log_id')
                ->unique()
                ->constrained('logs')
                ->onDelete('CASCADE');
            $table->text('content');
            $table->text('trace')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_messages');
    }
};
