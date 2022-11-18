<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Traits\ResponseTrait;

class PaymentController extends Controller
{
    use ResponseTrait;
   
    public function index()
    {
        try {
            $payments['payments'] = Payment::all();
            return $this->formatResponse(true, $payments);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function view(Payment $payment)
    {
        try {
            $payment->load('order');

            return $this->formatResponse(true, $payment);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
