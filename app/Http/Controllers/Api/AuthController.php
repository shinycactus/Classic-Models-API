<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
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
                // 'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $employee = Employee::create([
                // 'name' => $request->name,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->password),
                'extension' => $request->extension,
                'office_id' => $request->office_id,
                'job_title' => $request->job_title,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Employee Created Successfully',
                'token' => $employee->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
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
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateEmployee->errors()
                ], 401);
            }
            // dd($employee = Employee::where('email', $request->email)->first());
        //    dd($request->only(['email', 'password']));
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $employee = Employee::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $employee->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
