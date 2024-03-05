<?php

namespace Database\Seeders;

use App\Models\Setting\Setting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $term = Setting::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'description'  => $faker->randomHtml(),
            ];
        }
        $data["points"] = rand(1, 100);
        $data["post_points"] = rand(1, 100);
        $data["value_of_upgrate"] = rand(1, 100);
        $data["facebook"] = $faker->text(20);
        $data["twitter"] = $faker->text(20);
        $data["youtube"] = $faker->text(20);
        $data["instagram"] = $faker->text(20);
        $data["whatsapp"] = $faker->text(20);
        $data["tiktok"] = $faker->text(20);
        $data["phone"] = $faker->phoneNumber();
        $term->update($data);
    }
}
