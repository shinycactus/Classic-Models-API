<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseTrait;

class AuthController extends Controller
{
    use ResponseTrait; 

    /**
     * Create Employee
     * @param Request $request
     * @return Employee 
     */
    public function createEmployee(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email|unique:users,email',
                'first_name' => 'required',
                'last_name' => 'required',
                'password' => 'required',
                'extension' => 'required',
                'office_id' => 'required',
                'job_title' => 'required',
            ]);

            if($validateUser->fails()){
                return $this->formatResponse(false, $validateUser->errors());
            }

            $employee = Employee::create([
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->password),
                'extension' => $request->extension,
                'office_id' => $request->office_id,
                'job_title' => $request->job_title,
            ]);

            return $this->formatResponse(true, ['token' => $employee->createToken("API TOKEN")->plainTextToken]);

        } catch (\Throwable $th) {
            return $this->formatResponse(false, $th->getMessage());
        }
    }


    /**
     * Login The Employee
     * @param Request $request
     * @return Employee
     */
    public function loginEmployee(Request $request)
    {
        try {
            $validateEmployee = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateEmployee->fails()){
                return $this->formatResponse(false, $validateEmployee->errors());
            }

            if(!Auth::guard('employee')->attempt($request->only(['email', 'password']))){
                return $this->formatResponse(false, 'Email or Password incorrect.');
            }

            $employee = Employee::where('email', $request->email)->first();

            return $this->formatResponse(true, ['token' => $employee->createToken("API TOKEN")->plainTextToken]);
        } catch (\Throwable $th) {
            return $this->formatResponse(false, $th->getMessage());
        }
    }


    /**
     * Create Customer
     * @param Request $request
     * @return Customer 
     */
    public function createCustomer(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email|unique:users,email',
                'first_name' => 'required',
                'last_name' => 'required',
                'password' => 'required',
                'extension' => 'required',
                'office_id' => 'required',
                'job_title' => 'required',
            ]);

            if($validateUser->fails()){
                return $this->formatResponse(false, $validateUser->errors());
            }

            $customer = Customer::create([
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->password),
                'extension' => $request->extension,
                'office_id' => $request->office_id,
                'job_title' => $request->job_title,
            ]);

            return $this->formatResponse(true, ['token' => $customer->createToken("API TOKEN")->plainTextToken]);

        } catch (\Throwable $th) {
            return $this->formatResponse(false, $th->getMessage());
        }
    }


    /**
     * Login Customer
     * @param Request $request
     * @return Customer
     */
    public function loginCustomer(Request $request)
    {
        try {
            $validateCustomer = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateCustomer->fails()){
                return $this->formatResponse(false, $validateCustomer->errors());
            }

            if(!Auth::guard('customer')->attempt($request->only(['email', 'password']))){
                return $this->formatResponse(false, 'Email or Password incorrect.');
            }

            $customer = Customer::where('email', $request->email)->first();

            return $this->formatResponse(true, ['token' => $customer->createToken("API TOKEN")->plainTextToken]);
        } catch (\Throwable $th) {
            return $this->formatResponse(false, $th->getMessage());
        }
    }
}
