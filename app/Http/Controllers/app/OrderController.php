<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

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

    public function store(StoreOrderRequest $request)
    {
        // TODO: store policy
        try {
            $customer =  auth('sanctum')->user();
            $orderDetails = $this->getOrderDetails($request->input('order_details'));

            $order = Order::create([
                'status' => 'In Process',
                'comments' => $request->input('comments'),
                'customer_id' => $customer->id,
            ]);

            if ($order) {
                foreach($orderDetails as $orderDetail) {
                    $orderDetail['order_id'] = $order->id;
                    OrderDetail::create($orderDetail);
                }
            }

            return $this->formatResponse(true, $order->id);

        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    public function getOrderDetails($items)
    {   
        $orderDetails = [];
        foreach($items as $item) {
            $product = Product::where(['id' => $item['product_id']])->first();

            if (!$product) {
                $error = 'Product: ' . $item['product_id'] . ' not found';
                throw new HttpResponseException($this->formatResponse(false, $error));
            }

            $orderDetail = [
                'product_id' => $item['product_id'],
                'quantity_ordered' => $item['quantity_ordered'],
                'price_each' => $product->msrp,
            ];


            array_push($orderDetails, $orderDetail);
        }
        
        return $orderDetails;
    }
}
