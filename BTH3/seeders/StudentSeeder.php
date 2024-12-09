<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            ['first_name' => 'Liam', 'last_name' => 'Nguyen', 'date_of_birth' => '2018-03-15', 'parent_phone' => '0123456789', 'class_id' => 1],
            ['first_name' => 'Emma', 'last_name' => 'Tran', 'date_of_birth' => '2017-08-22', 'parent_phone' => '0987654321', 'class_id' => 2],
        ]);
    }
}
