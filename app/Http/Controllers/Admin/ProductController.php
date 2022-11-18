<?php

namespace App\Http\Controllers\Admin;

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

    public function view(Product $product)
    {
        try {
            $product->load('productLine');
            
            return $this->formatResponse(true, $product);
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
