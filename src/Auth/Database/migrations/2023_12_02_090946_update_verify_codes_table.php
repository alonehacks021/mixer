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
        Schema::table('verify_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('attempts')
                ->default(1);
            $table->string('hash', 60)
                ->unique();
            $table->dateTime('verified_at')
                ->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('checks')
                ->default(0);

            $table->dropIndex(['code']);
            $table->dropForeign(['user_id']);
            $table->dropUnique(['user_id', 'code']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('verify_codes', function (Blueprint $table) {
            $table->dropColumn('id', 'hash', 'verified_at', 'attempts', 'created_at', 'updated_at');

            $table->index(['code']);
            $table->unique(['user_id', 'code']);
        });
    }
};
