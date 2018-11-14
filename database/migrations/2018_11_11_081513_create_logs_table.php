<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('gameId');
            $table->string('question');
            $table->string('userAnswer');
            $table->string('rightAnswer');
            $table->unsignedInteger('points');
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gameId')->references('id')->on('games')->onDelete('cascade');
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
