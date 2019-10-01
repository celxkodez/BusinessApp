<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Register;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Register $request)
    {

        User::create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'User Account Created Successfully'
        ], 201);
    }

    /**
     * Login user.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'statusCode' => 200,
            'message' => 'User logged in',
            'token' => $user->createToken('business')->accessToken,
        ], 200);
    }
}
