<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->integer('player1');
            $table->integer('player2')->nullable();
            $table->integer('result')->nullable();
            $table->string('closed', 5)->nullable();
            $table->integer('claimed')->default(0);
            $table->string('battlecode')->unique();
            $table->integer('awarded_unit')->nullable();
            $table->integer('awarded_item')->nullable();
            $table->integer('awarded_gold')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battles');
    }
}
