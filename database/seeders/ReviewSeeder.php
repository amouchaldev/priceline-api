<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = $this->command->ask('generate reviews for which model ?', 'hotel');
        if (in_array($model, ['hotel'])) {
            if ($model === 'hotel') {
                $hotels = Hotel::all();
                foreach($hotels as $hotel) {
                    // users ids that's reviewed this hotel
                    $usersReviewHotel = Review::where('reviewable_type', 'App\Models\Hotel')
                                                ->where('reviewable_id', $hotel->id)
                                                ->pluck('user_id');
                    // users that not reviewed this hotel yet
                    $users = User::whereType('client')->whereNotIn('id', $usersReviewHotel)->get();
                    foreach($users as $user) {
                        Review::factory()->create([
                            'user_id' => $user->id,
                            'reviewable_type' => 'App\Models\Hotel',
                            'reviewable_id' => $hotel->id
                        ]);
                    }
                }
            $this->command->info('hotels reviews added successfully');
            }
        } 
        else $this->command->error('invalid model');
    }
}
