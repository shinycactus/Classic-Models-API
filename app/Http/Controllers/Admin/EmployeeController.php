<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Traits\ResponseTrait;

class EmployeeController extends Controller
{
    use ResponseTrait;
    
    public function index()
    {
        try {
            $employees['employees'] = Employee::all();
            return $this->formatResponse(true, $employees);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $employee['employee'] = Employee::
                with('office')->
                with('supervisor')->
                with('subordinate')->
                with('customers')->
                findOrFail($id);

            return $this->formatResponse(true, $employee);
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
