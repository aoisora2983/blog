<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_level')->insert([
            'promotion_id' => '1',
            'rarity' => 1,
            'value' => 1,
            'required_experience' => 100,
            'required_money' => 100,
        ]);
        DB::table('mst_level')->insert([
            'promotion_id' => '1',
            'rarity' => 1,
            'value' => 2,
            'required_experience' => 200,
            'required_money' => 200,
        ]);
    }
}
