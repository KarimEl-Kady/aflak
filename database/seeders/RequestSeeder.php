<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Request\Request;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $faker = Factory::create();
       for($i = 0 ; $i < 3 ; $i++){
           $data ["hotel_id"] = $faker->randomDigit();
           $data ["hotel_name"] = $faker->text(15);
           $data ["hotel_address"] = $faker->text(50);
           $data ["count_persons"] =$faker->randomDigit();
           $data ["count_rooms"] = $faker->randomDigit();
           $data ["checkin"] = $faker->date();
           $data ["checkout"] = $faker->date();
         Request::create($data);
    }

} }
