<?php

use Illuminate\Database\Seeder;

class StageMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_stage_material')->insert([
            'stage_id' => 1,
            'material_id' => 1,
            'drop_kind' => 1,
            'drop_number' => 2,
            'chance' => 0.5,
        ]);
    }
}
