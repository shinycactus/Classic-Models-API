<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductLineRequest;
use App\Http\Requests\UpdateProductLineRequest;
use App\Models\ProductLine;

class ProductLineController extends Controller
{
    
    public function index()
    {
        return ProductLine::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

   
    public function show(ProductLine $productLine)
    {
        return ProductLine::with('products')->find($productLine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductLine  $productLine
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductLine $productLine)
    {
        //
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
