<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('item_stat_name');
            $table->text('item_stat_description');
            $table->text('item_dev_description')->nullable();
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
        Schema::dropIfExists('item_stats');
    }
}
