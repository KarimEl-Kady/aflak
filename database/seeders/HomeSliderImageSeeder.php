<?php

namespace Database\Seeders;

use App\Models\HomeSlider\HomeSliderimage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSliderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HomeSliderimage::factory(3)->create();
    }
}
