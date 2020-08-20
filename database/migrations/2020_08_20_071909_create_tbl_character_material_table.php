<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCharacterMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_character_material', function (Blueprint $table) {
            $table->integer('character_id')->unsigned();
            $table->integer('develop_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('required_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();

            $table->primary(['character_id', 'develop_id', 'material_id'])
                  ->name('character_id_develop_id_material_id_primary');

            $table->foreign('character_id')->references('id')
                  ->on('mst_character')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('develop_id')->references('id')
                  ->on('mst_develop')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('material_id')->references('id')
                  ->on('mst_material')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_character_material');
    }
}
