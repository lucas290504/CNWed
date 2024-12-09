<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'Avengers: Endgame',
                'director' => 'Anthony và Joe Russo',
                'release_date' => '2019-04-26',
                'duration' => 181,
                'cinema_id' => 1, // Liên kết với CGV Vincom
            ],
            [
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'release_date' => '2010-07-16',
                'duration' => 148,
                'cinema_id' => 2, // Liên kết với Lotte Cinema
            ],
        ]);
    }
}
