<?php

namespace Database\Seeders;

use App\Models\WorldTerm\WorldTerm;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WorldTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        //
        $faker = Factory::create();
        $term = WorldTerm::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['text'  => $faker->randomHtml(),
          ];
        }

        $term->update($data);
    }
}
