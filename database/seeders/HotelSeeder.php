<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('How Many Hotel To Add ?', 10);
        Hotel::factory()->count($count)->has(Image::factory()->count(5))->create();
    }
}
