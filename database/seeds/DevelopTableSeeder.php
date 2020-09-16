<?php

use Illuminate\Database\Seeder;

class DevelopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_develop')->insert([
            'name' => '未昇進',
            'rarity' => 1,
            'group_id' => 1,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '昇進1',
            'rarity' => 4,
            'group_id' => 1,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '昇進2',
            'rarity' => 4,
            'group_id' => 1,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '1',
            'rarity' => 3,
            'group_id' => 2,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '特化1',
            'rarity' => 4,
            'group_id' => 2,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '1',
            'rarity' => 6,
            'group_id' => 4,
        ]);
        DB::table('mst_develop')->insert([
            'name' => '特化1',
            'rarity' => 6,
            'group_id' => 4,
        ]);
    }
}
