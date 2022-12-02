<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::get();

        foreach($orders as $order) {

            $orderStatusId = 1; // In Process
            if ($order->status == 'Shipped') {
                $orderStatusId = 2;
            } elseif ($order->status == 'Cancelled') {
                $orderStatusId = 3;
            } elseif ($order->status == 'On Hold') {
                $orderStatusId = 4;
            } elseif ($order->status == 'Disputed') {
                $orderStatusId = 5;
            }

            $order->update(['order_status_id' => $orderStatusId]);;
        }
    }
}
