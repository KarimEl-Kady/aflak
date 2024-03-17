<?php

namespace Database\Seeders;

use App\Models\OurStory\OurStoryFeature;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OurStoryFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {

            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $data[$localeCode] = [
                    'title' => $faker->text(10),
                ];
            }
            // $data['our_storey_id'] = 1;
            OurStoryFeature::create($data);
        }
    }
}
