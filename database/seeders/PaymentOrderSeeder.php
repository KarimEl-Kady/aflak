<?php

namespace Database\Seeders;

use App\Models\PaymentWay\PaymentOrder;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for($i = 0 ; $i < 3 ; $i++){

            $data ["order_receipt_image"] = $faker->text(50);
            $data ["oreder_balance"] = $faker->randomNumber(5, false);

          PaymentOrder::create($data);
    }
    }
}
