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
        // skill1
        DB::table('mst_skill')->insert([
            'kind' => 0,
            'name' => '1',
            'rarity' => 1,
            'level' => 1,
        ]);
        DB::table('mst_skill')->insert([
            'kind' => 0,
            'name' => '7',
            'rarity' => 1,
            'level' => 7,
        ]);
        DB::table('mst_skill')->insert([
            'kind' => 0,
            'name' => '特化I',
            'rarity' => 4,
            'level' => 8,
        ]);

        // skill2
        DB::table('mst_skill')->insert([
            'kind' => 1,
            'name' => '1',
            'rarity' => 4,
            'level' => 1,
        ]);
        DB::table('mst_skill')->insert([
            'kind' => 1,
            'name' => '7',
            'rarity' => 4,
            'level' => 7,
        ]);
        DB::table('mst_skill')->insert([
            'kind' => 1,
            'name' => '特化I',
            'rarity' => 4,
            'level' => 8,
        ]);

        // skill3 (レイアウトテスト用)
        DB::table('mst_skill')->insert([
            'kind' => 2,
            'name' => '1',
            'rarity' => 6,
            'level' => 1,
        ]);
    }
}
