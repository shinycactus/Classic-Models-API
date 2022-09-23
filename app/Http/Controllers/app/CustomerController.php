<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Traits\ResponseTrait;

class CustomerController extends Controller
{
    use ResponseTrait;
    
    public function index()
    {
        try {
            $customers['customers'] = Customer::all();
            return $this->formatResponse(true, $customers);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $customer['customer'] = Customer::
                with('salesRep')->
                with('orders')->
                findOrFail($id);

                return $this->formatResponse(true, $customer);
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
