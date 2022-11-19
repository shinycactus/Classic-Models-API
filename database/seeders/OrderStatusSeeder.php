<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderStatus = [
            [
                'id' => 1,
                'status' => 'In Process',
            ],
            [
                'id' => 2,
                'status' => 'Shipped',
            ],
            [
                'id' => 3,
                'status' => 'Cancelled',
            ],
            [
                'id' => 4,
                'status' => 'On Hold',
            ],
            [
                'id' => 5,
                'status' => 'Disputed',
            ],
        ];

        OrderStatus::insert($orderStatus);
    }
}
