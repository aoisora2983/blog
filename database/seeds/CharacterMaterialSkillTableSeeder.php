<?php

use Illuminate\Database\Seeder;

class CharacterMaterialSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_character_material_skill')->insert([
            'character_id' => 1,
            'skill_id' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
    }
}
