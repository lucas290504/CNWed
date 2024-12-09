<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            MedicineSeeder::class,
            SaleSeeder::class,
        ]);
        $this->call([
            ClassSeeder::class,
            StudentSeeder::class,
        ]);
        $this->call([
            ComputerSeeder::class,
            IssueSeeder::class,
        ]);
        $this->call([
            CinemaSeeder::class,
            MovieSeeder::class,
        ]);
        $this->call([
            ITCenterSeeder::class,
            HardwareDeviceSeeder::class,
        ]);
        $this->call([
            RenterSeeder::class,
            LaptopSeeder::class,
        ]);
        $this->call([
            LibrarySeeder::class,
            BookSeeder::class,
        ]);


    }
}
