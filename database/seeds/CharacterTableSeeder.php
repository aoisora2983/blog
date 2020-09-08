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
        DB::table('mst_character')->insert([
            'name' => 'name',
            'img' => 'img',
            'rarity' => 4,
            'job' => 1,
            'skill_1' => 'skill_1',
            'skill_2' => 'skill_2',
            'skill_3' => 'skill_3',
        ]);
    }
}
