<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Traits\ResponseTrait;


class OrderItemController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $orderItems['orderItems'] = OrderItem::all();
            return $this->formatResponse(true, $orderItems);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    public function view(OrderItem $orderItem)
    {
        try {
            $orderItem->load('order');
            $orderItem->load('product');

            return $this->formatResponse(true, $orderItem);
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
