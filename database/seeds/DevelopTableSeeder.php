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
        $promotion = 
        '
        [
            {
                "id": 1,
                "name": "未昇進",
                "max": 60
            },
            {
                "id": 2,
                "name": "昇進I",
                "max": 70
            }
        ]
        ';

        $skill =
        '
        [
            {
                "id": 1,
                "name": "1"
            },
            {
                "id": 2,
                "name": "2"
            },
            {
                "id": 3,
                "name": "特化I"
            }
        ]
        ';

        DB::table('mst_develop')->insert([
            'rarity' => 1,
            'promotion' => null,
            'skill1' => null,
            'skill2' => null,
            'skill3' => null,
        ]);
        DB::table('mst_develop')->insert([
            'rarity' => 2,
            'promotion' => null,
            'skill1' => null,
            'skill2' => null,
            'skill3' => null,
        ]);
        DB::table('mst_develop')->insert([
            'rarity' => 3,
            'promotion' => $promotion,
            'skill1' => $skill,
            'skill2' => null,
            'skill3' => null,
        ]);
        DB::table('mst_develop')->insert([
            'rarity' => 4,
            'promotion' => $promotion,
            'skill1' => $skill,
            'skill2' => $skill,
            'skill3' => null,
        ]);
        DB::table('mst_develop')->insert([
            'rarity' => 5,
            'promotion' => $promotion,
            'skill1' => $skill,
            'skill2' => $skill,
            'skill3' => null,
        ]);
        DB::table('mst_develop')->insert([
            'rarity' => 6,
            'promotion' => $promotion,
            'skill1' => $skill,
            'skill2' => $skill,
            'skill3' => $skill,
        ]);
    }
}
