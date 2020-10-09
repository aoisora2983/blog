<?php

use Illuminate\Database\Seeder;

class CharacterMaterialPromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_character_material_promotion')->insert([
            'character_id' => 1,
            'promotion_id' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
        DB::table('tbl_character_material_promotion')->insert([
            'character_id' => 4,
            'promotion_id' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
        DB::table('tbl_character_material_promotion')->insert([
            'character_id' => 4,
            'promotion_id' => 1,
            'material_id' => 2,
            'required_number' => 6,
        ]);
        DB::table('tbl_character_material_promotion')->insert([
            'character_id' => 4,
            'promotion_id' => 2,
            'material_id' => 1,
            'required_number' => 10,
        ]);
    }
}
