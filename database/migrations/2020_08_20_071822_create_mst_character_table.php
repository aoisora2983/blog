<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_character', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('img');
            $table->integer('rarity');
            $table->integer('job');
            $table->string('skill_1', 50)->nullable();
            $table->string('skill_2', 50)->nullable();
            $table->string('skill_3', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_character');
    }
}
