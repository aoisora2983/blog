<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCharacterMaterialPromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_character_material_promotion', function (Blueprint $table) {
            $table->integer('character_id')->unsigned();
            $table->integer('promotion_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('required_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();

            $table->primary(['character_id', 'promotion_id', 'material_id'])
                  ->name('character_id_promotion_id_material_id_primary');

            $table->foreign('character_id')->references('id')
                  ->on('mst_character')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('promotion_id')->references('id')
                  ->on('mst_promotion')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_character_material_promotion');
    }
}
