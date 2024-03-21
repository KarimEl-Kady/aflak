<?php

namespace Database\Seeders;

use App\Models\OurGoal\OurGoal;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OurGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        $our_goal = OurGoal::firstOrCreate();


        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
           'text'   => $faker->text(20),

          ];
        }
        $our_goal->update($data);
    }
}
