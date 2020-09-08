<?php

use Illuminate\Database\Seeder;

class CharacterMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_character_material')->insert([
            'character_id' => 1,
            'develop_id' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
    }
}
