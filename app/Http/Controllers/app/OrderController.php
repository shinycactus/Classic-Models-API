<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Traits\ResponseTrait;

class OrderController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        // $user =  auth('sanctum')->user();
        // dd($user);

        try {
            $orders['orders'] = Order::all();
            return $this->formatResponse(true, $orders);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function view(Order $order)
    {
        try {
            $this->authorize('view', $order);

            $order->load('customer');
            $order->load('orderDetails');
            $order->load('payment');
                
            return $this->formatResponse(true, $order);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
