<?php

namespace Database\Seeders;

use App\Models\AboutUs\AboutUsFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AboutUsFeature::factory(4)->create();
    }
}
