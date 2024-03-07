<?php

namespace Database\Seeders;

use App\Models\AboutUs\AboutUsImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AboutUsImage::factory(2)->create();
    }
}
