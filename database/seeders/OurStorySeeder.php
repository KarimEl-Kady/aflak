<?php

namespace Database\Seeders;

use App\Models\OurStory\OurStory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OurStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        $our_story = OurStory::firstOrCreate();


        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $faker->text(10),
           'text'   => $faker->text(20),
           'label_title' => $faker->text(10),
           'label_text' => $faker->text(20),
          ];
        }
        $our_story->update($data);
    }
}
