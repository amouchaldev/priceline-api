<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hotels = Hotel::all();
        return [
            'hotel_id' => $hotels->random()->id,
            'address' => fake()->address(),
            'description' => fake()->paragraph(4),
            'bed' => random_int(1, 4)
        ];
    }
}
