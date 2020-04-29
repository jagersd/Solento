<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_units', function (Blueprint $table) {
            $table->id();
            $table->integer('race_id');
            $table->string('name');
            $table->integer('hp');
            $table->integer('strength');
            $table->integer('armor');
            $table->integer('intellect');
            $table->integer('speed');
            $table->integer('cost');
            $table->text('description');
            $table->integer('in_store')->default(1);
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
        Schema::dropIfExists('base_units');
    }
}
