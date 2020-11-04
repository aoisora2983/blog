<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_material', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('grade');
            $table->text('img');
            $table->text('option');
            $table->integer('child_material_id1')->nullable();
            $table->integer('child_required_number1')->nullable();
            $table->integer('child_material_id2')->nullable();
            $table->integer('child_required_number2')->nullable();
            $table->integer('child_material_id3')->nullable();
            $table->integer('child_required_number3')->nullable();
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
        Schema::dropIfExists('mst_material');
    }
}
