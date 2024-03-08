<?php

namespace Database\Factories\Advantage;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdvantageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [];
        $data['image'] ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLUMEziTPxBzsrAVjF75ZaWH8CzkuosMMbXg&usqp=CAU";
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => fake()->text(20),
                'text' => fake()->text(50),
            ];
        }
        return $data;
    }
}
