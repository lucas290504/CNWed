<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'John Doe',
                'reported_date' => now(),
                'description' => 'Máy không khởi động được.',
                'urgency' => 'High',
                'status' => 'Open',
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Jane Smith',
                'reported_date' => now(),
                'description' => 'Hệ điều hành bị lỗi driver.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
            ],
        ]);
    }
}
