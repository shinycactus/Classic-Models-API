<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductLineRequest;
use App\Http\Requests\UpdateProductLineRequest;
use App\Models\ProductLine;
use App\Traits\ResponseTrait;

class ProductLineController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $productLines['productLines'] = ProductLine::all();
            return $this->formatResponse(true, $productLines);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductLineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductLineRequest $request)
    {
        //
    }


    public function show($id)
    {
        try {
            $product['productLine'] = ProductLine::with('products')->findOrFail($id);
            return $this->formatResponse(true, $product);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductLineRequest  $request
     * @param  \App\Models\ProductLine  $productLine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductLineRequest $request, ProductLine $productLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductLine  $productLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLine $productLine)
    {
        //
    }
}
