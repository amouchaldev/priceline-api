<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
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
        $cities = City::whereIn('id', [4, 30, 103, 177, 327, 345, 397, 58])->get();
        $admins = User::whereType('admin')->get();
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(3),
            'address' => fake()->address(),
            'city_id' => $cities->random()->id,
            'user_id' => $admins->random()->id,
            'rue' => fake()->streetAddress(),
            'pays' => 'maroc',
            'stars' => rand(3, 5),
            'code_zip' => fake()->postcode(),
        ];
    }
}
