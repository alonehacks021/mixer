<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_log_alert', function (Blueprint $table) {
            $table->foreignId('log_alert_id')
                ->constrained('log_alerts')
                ->onDelete('CASCADE');
            $table->foreignId('log_id')
                ->constrained('logs')
                ->onDelete('CASCADE');

            $table->unique(['log_alert_id', 'log_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_log_alert');
    }
};
