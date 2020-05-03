<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('item_hp')->default(0);
            $table->integer('item_strength')->default(0);
            $table->integer('item_armor')->default(0);
            $table->integer('item_intellect')->default(0);
            $table->integer('item_magic_defence')->default(0);
            $table->integer('item_speed')->default(0);
            $table->integer('item_cost')->default(0);
            $table->integer('item_sell_price');
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
        Schema::dropIfExists('items');
    }
}
