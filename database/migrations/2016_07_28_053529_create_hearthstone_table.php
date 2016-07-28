<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateHearthstoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearthstone_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cardId');
            $table->string('name');
            $table->string('cardSet');
            $table->string('type');
            $table->string('rarity');
            $table->string('text');
            $table->string('playerClass');
            $table->string('locale');
            $table->string('img');
            $table->string('imgGold');
            $table->string('faction');
            $table->string('health');
            $table->string('attack');
            $table->string('race');
            $table->string('cost');
            $table->string('collectible');
            $table->string('flavor');
            $table->string('artist');
            $table->string('howToGet');
            $table->string('howToGetGold');
            $table->string('durability');
            $table->string('elite');
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
        Schema::drop('hearthstone_cards');
    }
}
