<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        DB::table('cinemas')->insert([
            ['name' => 'CGV Vincom', 'location' => 'Vincom Center, Hà Nội', 'total_seats' => 300],
            ['name' => 'Lotte Cinema', 'location' => 'Lotte Tower, TP.HCM', 'total_seats' => 250],
        ]);
    }

}
