<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_skill')->insert([
            'kind' => 1,
            'name' => '1',
            'rarity' => '1',
        ]);
        DB::table('mst_skill')->insert([
            'kind' => 1,
            'name' => '特化I',
            'rarity' => '4',
        ]);
    }
}
