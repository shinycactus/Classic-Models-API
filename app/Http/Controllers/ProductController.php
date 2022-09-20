<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use ResponseTrait;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $products['products'] = Product::all();
            return $this->formatResponse(true, $products);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }



    public function store(StoreProductRequest $request)
    {
        //
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $product['product'] = Product::with('productLine')->findOrFail($id);
            return $this->formatResponse(true, $product);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
