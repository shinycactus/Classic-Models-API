<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
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



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
