<?php

namespace Database\Seeders;

use App\Models\Offer\Offer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for($i = 0 ; $i < 3 ; $i++){

            $data ["price"] = $faker->text(50);
            // $data ["describtion"] = $faker->text(50);
            $data ["expired_at"] = $faker->date();
            // $data ["services"] = $faker->json_decode;
            // $data ["status"] = $faker->text(50);

          Offer::create($data);
    }
}
}
