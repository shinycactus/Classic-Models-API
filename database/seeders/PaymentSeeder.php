<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::with('orderDetails')->get();

        foreach($orders as $order) {

            $amount = 0;

            foreach($order->orderDetails as $orderDetail) {
                $itemTotalPrice = ($orderDetail->price_each * $orderDetail->quantity_ordered);
                $amount += $itemTotalPrice;
            }

            Payment::insert([
                'order_id' => $order->id,
                'check_number' => $this->generateCheckNumber(),
                'payment_date' => $order->order_date,
                'amount' => $amount,
            ]);
        }

    }

    public function generateCheckNumber() {
        $length = 7;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
