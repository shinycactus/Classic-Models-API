<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Traits\ResponseTrait;

class OfficeController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        try {
            $offices['offices'] = Office::all();
            return $this->formatResponse(true, $offices);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $office['office'] = Office::with('employees')->findOrFail($id);
            return $this->formatResponse(true, $office);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
