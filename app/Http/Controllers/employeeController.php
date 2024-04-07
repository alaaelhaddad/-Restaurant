<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('employee')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('employee')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('employee')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('employee')->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
       $input= $request->validate([
        'name'=>['required','string'],
        'email'=>['required','email'],
        'password'=>['required']
       ]);
       employee ::create($input);
       return response()->json(["message"=>"employee is added successfully"]);
    }



    //poe
    public function getEmployees()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function getEmployee($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }

}