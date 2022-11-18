<?php

namespace App\Http\Controllers\app;

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


    public function view(Employee $employee)
    {
        try {
            $employee->load('office');
            $employee->load('supervisor');
            $employee->load('subordinate');
            $employee->load('customers');

            return $this->formatResponse(true, $employee);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }
}
