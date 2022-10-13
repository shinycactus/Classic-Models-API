<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\ResponseTrait;

class ProductController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $products['products'] = Product::all();
            return $this->formatResponse(true, $products);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $product['product'] = Product::with('productLine')->findOrFail($id);
            return $this->formatResponse(true, $product);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
