<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = $this->command->ask('user type :', 'client');
        if (in_array($type, ['client', 'admin'])) {
            $count = $this->command->ask("How many $type you want to add ?", 7);
            User::factory()->count($count)->create(['type' => $type]);
        }
        else $this->command->error('invalid type');
    }
}
