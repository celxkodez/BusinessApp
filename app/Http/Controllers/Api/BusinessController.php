<?php

namespace App\Http\Controllers\api;

use App\BusinessModel;
use App\User;
use App\Http\Requests\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Create a new Business.
     *
     * @param  array  $data
     * @return \App\BusinessModel
     */
    protected function create(Business $request)
    {

        Auth::user()->business()->create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Your Business Has Been Created Successfully'
        ], 201);
    }
}
