<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = City::all();
        return [
            'name' => fake()->sentence(4),
            'description' => fake()->paragraph(3),
            'address' => fake()->address(),
            'city_id' => $cities->random()->id
        ];
    }
}
