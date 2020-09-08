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
            'name' => 'name',
            'rarity' => 4,
        ]);
    }
}
