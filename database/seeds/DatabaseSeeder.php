<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MaterialTableSeeder::class,
            CharacterTableSeeder::class,
            DevelopTableSeeder::class,
            LevelTableSeeder::class,
            StageTableSeeder::class,
            StageMaterialTableSeeder::class,
            SkillTableSeeder::class,
            CharacterMaterialPromotionTableSeeder::class,
            CharacterMaterialSkillTableSeeder::class,
        ]);
    }
}
