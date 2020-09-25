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
            'value' => 1,
            'required_experience' => 1000,
            'required_money' => 2000,
        ]);
    }
}
