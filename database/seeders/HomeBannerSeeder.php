<?php

namespace Database\Seeders;

use App\Models\HomeBanner\HomeBanner;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for($i = 0 ; $i < 3 ; $i++){

            $data ["link"] = $faker->text(50);
            $data ["image"] = $faker->text(50);

          HomeBanner::create($data);
    }
}
}
