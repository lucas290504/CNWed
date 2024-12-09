<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computers')->insert([
            [
                'computer_name' => 'Lab1-PC05',
                'model' => 'Dell Optiplex 7090',
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5-11400',
                'memory' => 16,
                'available' => true,
            ],
            [
                'computer_name' => 'Lab2-PC07',
                'model' => 'HP EliteDesk 800',
                'operating_system' => 'Ubuntu 20.04',
                'processor' => 'Intel Core i7-10700',
                'memory' => 32,
                'available' => false,
            ],
        ]);
    }
}
