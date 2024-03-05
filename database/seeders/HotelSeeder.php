<?php

namespace Database\Seeders;

use App\Models\Hotel\Hotel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for($i = 0 ; $i < 3 ; $i++){

            $data ["name"] = $faker->text(50);
            $data ["country"] = $faker->text(50);
            $data ["city"] = $faker->text(50);

          Hotel::create($data);
    }
    }
}
