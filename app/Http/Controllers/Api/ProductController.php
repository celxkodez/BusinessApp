<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\ProductModel;
use App\BusinessModel;
use App\Http\Requests\business;
use Illuminate\Database\Schema\Builder;
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

    /**
     * Update existing Product.
     *
     * @param  array  $data
     * @return JSON
     */
    protected function update(CreateProduct $request, $productId)
    {
        $business_id = $request->get('business_id');
        // check if business exists, and if it belongs to the user trying to update the product
        $business = BusinessModel::findOrFail($business_id)
            ->where('user_id', Auth::id())
            ->get();


        // if $business varaible is empty then it means the business id does not exist,
        // or the user is trying to update a product that does not belong to him/her
        if (count($business) == 0) {
            return response()->json([
                'statusCode' => 404,
                'message' => "Business with ID $business_id not found, or does not belong to user"
            ], 404);
        }

        $updatedProduct = ProductModel::findOrFail($productId)
            ->where('business_id', $business_id)
            ->update($request->all());

        if ($updatedProduct == 0) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Unable to update product'
            ], 400);
        }

        return response()->json([
            'statusCode' => 200,
            'message' => 'Your Product Has Been Updated Successfully'
        ], 201);
    }
}
