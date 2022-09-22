<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Models\OrderDetail;
use App\Traits\ResponseTrait;

class OrderDetailController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $orderDetails['orderDetails'] = OrderDetail::all();
            return $this->formatResponse(true, $orderDetails);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

   
    public function show($id)
    {
        try {
            $orderDetail['orderDetail'] = OrderDetail::findOrFail($id);
            return $this->formatResponse(true, $orderDetail);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
