<?php

namespace Database\Seeders;

use App\Models\CommonQuestion\CommonQuestion;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CommonQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {

            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $data[$localeCode] = [
                    'question' => $faker->realText(50),
                    'answer' => $faker->realText(150),
                ];
            }

            CommonQuestion::create($data);
        }
    }
}
