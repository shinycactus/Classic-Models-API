<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductLineSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\OfficeSeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderItemSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductLineSeeder::class,
            ProductSeeder::class,
            OfficeSeeder::class,
            EmployeeSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
