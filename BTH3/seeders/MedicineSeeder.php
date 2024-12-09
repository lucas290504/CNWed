<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert([
            ['name' => 'Paracetamol', 'brand' => 'ABC', 'dosage' => '500mg', 'form' => 'Tablet', 'price' => 10.5, 'stock' => 100],
            ['name' => 'Ibuprofen', 'brand' => 'XYZ', 'dosage' => '200mg', 'form' => 'Capsule', 'price' => 15.0, 'stock' => 50],
            // Thêm các thuốc khác nếu cần
        ]);
    }

}
