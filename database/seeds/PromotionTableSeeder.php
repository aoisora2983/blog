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
        DB::table('mst_promotion')->insert([
            'name' => '未昇進',
            'rarity' => 1,
        ]);
        DB::table('mst_promotion')->insert([
            'name' => '昇進I',
            'rarity' => 3,
        ]);
        DB::table('mst_promotion')->insert([
            'name' => '昇進II',
            'rarity' => 4,
        ]);
    }
}
