<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommonSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_common_skill', function (Blueprint $table) {
            $table->integer('character_id')->unsigned();
            $table->integer('level');
            $table->integer('material_id');
            $table->integer('required_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();

            $table->primary(['character_id', 'level'])
                  ->name('character_id_level_primary');

            $table->foreign('character_id')->references('id')
                  ->on('mst_character')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_common_skill');
    }
}
