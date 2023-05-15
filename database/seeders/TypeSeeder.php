<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Image;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('How Many Type To Add To Each Hotel', 5);
        $hotels = Hotel::all();
        foreach($hotels as $hotel) {
                // Type::factory()->count(6)->create(['hotel_id' => $hotel->id]);
                Type::factory()->count(6)->for($hotel)->has(Image::factory()->count(6))->create();
        }
    }
}
