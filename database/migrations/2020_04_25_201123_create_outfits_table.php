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
            $table->integer('position');
            $table->integer('outfit_weight')->default(1);
            $table->integer('item1_id')->default(0);
            $table->integer('item2_id')->default(0);
            $table->integer('item3_id')->default(0);
            $table->string('name')->nullable();
            $table->integer('sell_price')->nullable();
            $table->integer('exp')->default(0);
            $table->text('custom_description')->nullable();
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
