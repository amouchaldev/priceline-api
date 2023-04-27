<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Room;
use Database\Factories\ImageRoomFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = collect([
            'https://media.cnn.com/api/v1/images/stellar/prod/140127103345-peninsula-shanghai-deluxe-mock-up.jpg?q=w_2226,h_1449,x_0,y_0,c_fill',
            'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
            'https://www.cvent.com/sites/default/files/image/2021-10/hotel%20room%20with%20beachfront%20view.jpg',
            'https://static.theprint.in/wp-content/uploads/2022/10/Hotel.jpg?compress=true&quality=80&w=376&dpr=2.6',
            'https://i.insider.com/5db9a47d045a31328a5b6fde?width=600&format=jpeg&auto=webp',
            'https://www.hotelmalaysia.com.my/images/Deluxe%20Room/IMGL6280xxx.jpg',
            'https://cdn.dnaindia.com/sites/default/files/styles/full/public/2019/09/25/870587-hotel-room-092519.jpg',
            'https://images.pexels.com/photos/1579253/pexels-photo-1579253.jpeg?cs=srgb&dl=pexels-engin-akyurt-1579253.jpg&fm=jpg',
            'https://tradewindshotel.com.au/wp-content/uploads/2017/03/Studio_Image1-860x575.jpg'
        ]);
        //
        $rooms = Room::all();
        $rooms->each(function ($room) use($images) {
            Image::factory(3)->create([
            'path' => $images->random(),
            'imageable_id' => $room->id,
            'imageable_type' => 'App\Models\Room'
            ]);
        });
    }
}
