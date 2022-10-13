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
            $orderDetails['orderDetails'] = OrderDetail::all();
            return $this->formatResponse(true, $orderDetails);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $orderDetail['orderDetail'] = OrderDetail::
                with('order')->
                with('product')->
                findOrFail($id);

                return $this->formatResponse(true, $orderDetail);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
