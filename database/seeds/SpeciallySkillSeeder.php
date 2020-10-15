<?php

use Illuminate\Database\Seeder;

class SpeciallySkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_specially_skill')->insert([
            'character_id' => 3,
            'kind' => 1,
            'level' => 8,
            'material_id' => 1,
            'required_number' => 2,
        ]);
        DB::table('tbl_specially_skill')->insert([
            'character_id' => 3,
            'kind' => 1,
            'level' => 9,
            'material_id' => 1,
            'required_number' => 2,
        ]);
        DB::table('tbl_specially_skill')->insert([
            'character_id' => 3,
            'kind' => 2,
            'level' => 8,
            'material_id' => 1,
            'required_number' => 2,
        ]);
    }
}
