<?php

namespace Database\Seeders;

use App\Models\HomeSlider\HomeSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HomeSlider::factory(1)->create();
    }
}
