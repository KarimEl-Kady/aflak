<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HomeSlider\HomeSliderTranslation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            // UserSeeder::class,

            AdminSeeder::class,
            HomeSliderSeeder::class,
            AdvantageSeeder::class,
            ServiceSeeder::class,
            HomeSliderSeeder::class,
            // SettingSeeder::class,
        ]);
    }
}
