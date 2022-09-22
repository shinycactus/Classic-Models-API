<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
    }

  
    public function show($id)
    {
        try {
            $employee['employee'] = Employee::with('office')->findOrFail($id);
            return $this->formatResponse(true, $employee);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
