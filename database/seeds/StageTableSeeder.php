<?php

use Illuminate\Database\Seeder;

class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_stage')->insert([
            'class' => 'class',
            'name' => 'name',
            'stage_kind' => 1,
            'stamina' => 6,
            'is_boss' => false,
            'recommendation' => 'recommendation',
        ]);
    }
}
