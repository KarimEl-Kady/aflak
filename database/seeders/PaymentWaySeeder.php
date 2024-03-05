<?php

namespace Database\Seeders;

use App\Models\PaymentWay\PaymentWay;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for($i = 0 ; $i < 3 ; $i++){

            $data ["title"] = $faker->text(50);
            $data ["sub_title"] = $faker->text(50);
            $data ["type"] = $faker->text(50);

            $data ["image"] = $faker->text(50);

          PaymentWay::create($data);
    }
}
}
