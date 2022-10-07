<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Traits\ResponseTrait;
use Laravel\Sanctum\PersonalAccessToken;



class OrderController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $user =  auth('sanctum')->user();
        dd($user);

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
                with('payment')->
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
