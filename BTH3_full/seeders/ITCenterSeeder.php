<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ITCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('it_centers')->insert([
            ['name' => 'Trung tâm Tin học ABC', 'location' => '456 Đường Y, TP.HCM', 'contact_email' => 'contact@abc.com'],
            ['name' => 'Trung tâm Tin học DEF', 'location' => '789 Đường Z, Hà Nội', 'contact_email' => 'contact@def.com'],
        ]);
    }
}
