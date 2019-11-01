<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\ProductModel;
use App\BusinessModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Create a new Product.
     *
     * @param  array  $data
     * @return JSON
     */
    protected function create(CreateProduct $request)
    {
        // check if business exists, and if the user owns the business
        BusinessModel::findOrFail($request->get('business_id'))
            ->where('user_id', Auth::id());

        ProductModel::create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Your Product Has Been Created Successfully'
        ], 201);
    }
}
