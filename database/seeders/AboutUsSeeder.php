<?php

namespace Database\Seeders;

use App\Models\AboutUs\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AboutUs::factory(1)->create();
    }
}
