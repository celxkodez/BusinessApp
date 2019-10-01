<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Requests\auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(auth $request)
    {
        // assign hashed password to password field
        $request->password = bcrypt($request->password);
        User::create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'User Account Created Successfully'
        ], 201);
    }
}
