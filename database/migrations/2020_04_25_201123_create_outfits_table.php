<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outfits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('unit_id');
            $table->integer('current_hp');
            $table->integer('item1_id');
            $table->integer('item2_id');
            $table->integer('item3_id');
            $table->string('name');
            $table->integer('sell_price');
            $table->integer('exp');
            $table->text('custom_description');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('outfits');
    }
}
