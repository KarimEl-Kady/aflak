<?php

namespace Database\Factories\HomeSlider;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HomeSliderImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [];
        $data['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRScJlLf3_z5p2FKV9s-rd5aygSb8mKH5AGNg&usqp=CAU";
        return $data;
    }
}
