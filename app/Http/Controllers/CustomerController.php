<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
