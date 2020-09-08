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
        ]);
    }
}
