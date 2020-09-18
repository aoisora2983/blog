<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstDevelopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_develop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rarity');
            $table->text('promotion')->nullable();
            $table->text('skill1')->nullable();
            $table->text('skill2')->nullable();
            $table->text('skill3')->nullable();
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
        Schema::dropIfExists('mst_develop');
    }
}
