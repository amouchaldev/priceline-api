<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = Hotel::all();
        $count = $this->command->ask('How Many Room To Add For Each Hotel ?', 10);
        foreach($hotels as $hotel) {
            $types = Type::where('hotel_id', $hotel->id)->get();
            Room::factory()->count($count)
            ->for($types->random())
            ->for($hotel)->create();
        }
    }
}
