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
        try {
            $orders['orders'] = Order::all();
            return $this->formatResponse(true, $orders);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $order['order'] = Order::
                with('customer')->
                with('orderDetails')->
                findOrFail($id);
                
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
