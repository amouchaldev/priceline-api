<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            ['id' => 1, 'name' => 'Tanger-Tétouan-Al Hoceïma'],
            ['id' => 2, 'name' => 'l\'Oriental'],
            ['id' => 3, 'name' => 'Fès-Meknès'],
            ['id' => 4, 'name' => 'Rabat-Salé-Kénitra'],
            ['id' => 5, 'name' => 'Béni Mellal-Khénifra'],
            ['id' => 6, 'name' => 'Casablanca-Settat'],
            ['id' => 7, 'name' => 'Marrakech-Safi'],
            ['id' => 8, 'name' => 'Drâa-Tafilalet'],
            ['id' => 9, 'name' => 'Souss-Massa'],
            ['id' => 10, 'name' => 'Guelmim-Oued Noun'],
            ['id' => 11, 'name' => 'Laâyoune-Sakia El Hamra'],
            ['id' => 12, 'name' => 'Dakhla-Oued Ed Dahab'],
        ]);
        $this->command->info('regions added successfully');
    }
}
