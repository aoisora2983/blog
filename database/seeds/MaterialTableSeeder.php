<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_material')->insert([
            'name' => 'name',
            'grade' => 1,
            'img' => 'img',
            'option' => 100,
        ]);
        DB::table('mst_material')->insert([
            'name' => 'name2',
            'grade' => 2,
            'img' => 'img2',
            'option' => 200,
        ]);
        DB::table('mst_material')->insert([
            'name' => 'name3',
            'grade' => 2,
            'img' => 'img3',
            'option' => 100,
        ]);
    }
}
