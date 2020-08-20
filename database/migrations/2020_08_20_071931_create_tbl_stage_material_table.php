<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStageMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stage_material', function (Blueprint $table) {
            $table->integer('stage_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('drop_kind');
            $table->integer('drop_number');
            $table->double('chance', 8, 5);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();

            $table->primary(['stage_id', 'material_id', 'drop_kind'])
                  ->name('stage_id_material_id_drop_kind_primary');

            $table->foreign('stage_id')->references('id')
                  ->on('mst_stage')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_stage_material');
    }
}
