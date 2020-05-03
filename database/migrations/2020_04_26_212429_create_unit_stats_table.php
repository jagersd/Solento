<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->string('stat_name');
            $table->text('stat_description');
            $table->text('dev_description');
            $table->integer('stat_value')->nullable();
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
        Schema::dropIfExists('unit_stats');
    }
}
