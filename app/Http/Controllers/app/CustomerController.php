<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Traits\ResponseTrait;

class CustomerController extends Controller
{
    use ResponseTrait;
   
    public function view(Customer $customer)
    {
        try {
            $customer->load('salesRep');
            $customer->load('orders');

            return $this->formatResponse(true, $customer);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    // TODO
    // public function update

    // TODO
    // public function destroy
}
