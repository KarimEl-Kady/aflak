<?php

namespace Database\Seeders;

use App\Models\NewsEmail\NewsEmaillSetting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsEmailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();


        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $faker->text(10),
           'subtitle'   => $faker->text(20),

          ];
          $data['image'] = 'https://www.netsuite.com/portal/assets/img/business-articles/erp/social-logistics.jpg';
        }
            NewsEmaillSetting::create($data);
        }
    }

