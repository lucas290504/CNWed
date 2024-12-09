<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            ['medicine_id' => 1, 'quantity' => 10, 'sale_date' => now(), 'customer_phone' => '0123456789'],
            ['medicine_id' => 2, 'quantity' => 5, 'sale_date' => now(), 'customer_phone' => '0987654321'],
            // Thêm các giao dịch khác nếu cần
        ]);
    }

}
