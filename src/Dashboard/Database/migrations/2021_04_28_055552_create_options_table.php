<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{

    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->string('name', 50);
            $table->text('val')
                ->nullable();
            $table->timestamps();

            $table->index(['user_id', 'name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
