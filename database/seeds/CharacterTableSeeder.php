<?php

use Illuminate\Database\Seeder;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 6; $i++) {
            DB::table('mst_character')->insert([
                'name' => 'name' . $i,
                'img' => 'img',
                'rarity' => $i,
                'job' => $i,
                'tag1' => 1,
                'tag2' => 2,
                'tag3' => 3,
                'tag4' => null,
            ]);
        }
    }
}
