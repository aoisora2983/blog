<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_stage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class', 50);
            $table->string('name', 50);
            $table->integer('stage_kind'); // ステージ種類(恒常、イベント...)
            $table->integer('stamina');
            $table->boolean('is_boss');
            $table->string('recommendation', 50);
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
        Schema::dropIfExists('mst_stage');
    }
}
