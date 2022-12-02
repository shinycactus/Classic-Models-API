<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Traits\ResponseTrait;

class OrderDetailController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $orderItems['orderItems'] = OrderDetail::all();
            return $this->formatResponse(true, $orderItems);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    public function view(OrderDetail $orderDetail)
    {
        try {
            $orderDetail->load('order');
            $orderDetail->load('product');
            
            return $this->formatResponse(true, $orderDetail);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
