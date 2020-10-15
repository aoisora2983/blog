<?php

use Illuminate\Database\Seeder;

class CommonSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_common_skill')->insert([
            'character_id' => 1,
            'level' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
        DB::table('tbl_common_skill')->insert([
            'character_id' => 3,
            'level' => 1,
            'material_id' => 1,
            'required_number' => 2,
        ]);
    }
}
