<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $hotels = Hotel::all();
        $status = ['draft','active','inactive'];
        return [
            'name' => fake()->sentence(1),
            'number_bed' => rand(1, 4),
            'price' => rand(200, 1500),
            'tarif_mensuel' => rand(0, 10),
            'tarif_hebdomadaire' => rand(0, 20),
            'NbrPersons' => function (array $attributes) {
                switch ($attributes['number_bed']) {
                    case 1: return 1;
                    case 2: return 2;
                    case 3: return 3;
                    case 4: return 4;
                }
            },
            'room_size' => rand(30, 110),
            'status' => $status[rand(0, count($status) - 1)]
        ];
    }
}
