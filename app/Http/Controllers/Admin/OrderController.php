<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Traits\ResponseTrait;

class OrderController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $user =  auth('sanctum')->user();
        // dd($user);

        try {
            $orders['orders'] = Order::with('orderItems')->get();
            return $this->formatResponse(true, $orders);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function view(Order $order)
    {
        try {
            $order->load('customer');
            $order->load('orderItems');
            $order->load('payment');
                
            return $this->formatResponse(true, $order);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    // TODO
    // public function store

    // TODO
    // public function update

    // TODO
    // public function destroy
}
