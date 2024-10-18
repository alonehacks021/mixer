<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nahad_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nahad_id')
                ->nullable();
            $table->unsignedBigInteger('nahad_parent_id')
                ->nullable()
                ->index();
            $table->unsignedTinyInteger('type');
            $table->string('title', 191);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nahad_groups');
    }
};
