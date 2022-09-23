<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


    public function show($id)
    {
        try {
            $product['productLine'] = ProductLine::with('products')->findOrFail($id);
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
