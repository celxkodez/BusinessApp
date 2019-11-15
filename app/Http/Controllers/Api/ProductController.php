<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\ProductModel;
use App\StoreModel;
use App\Http\Requests\Store;
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
        StoreModel::findOrFail($request->get('store_id'))
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
        $store_id = $request->get('store_id');
        // check if store exists, and if it belongs to the user trying to update the product
        $store = StoreModel::findOrFail($store_id)
            ->where('user_id', Auth::id())
            ->get();


        // if $store varaible is empty then it means the store id does not exist,
        // or the user is trying to update a product that does not belong to him/her
        if (count($store) == 0) {
            return response()->json([
                'statusCode' => 404,
                'message' => "Store with ID $store_id not found, or does not belong to user"
            ], 404);
        }

        $updatedProduct = ProductModel::findOrFail($productId)
            ->where('store_id', $store_id)
            ->update($request->all());

        if ($updatedProduct == 0) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Unable to update product'
            ], 500);
        }

        return response()->json([
            'statusCode' => 200,
            'message' => 'Your Product Has Been Updated Successfully'
        ], 200);
    }

    /**
     * Get products registered under a store.
     *
     * @param  array  $data
     * @return JSON
     */
    protected function getStoreProducts(Request $request, $storeId)
    {
        // TODO: implement pagination

        $product = StoreModel::findOrFail($storeId)
            ->products()
            ->get();

        return response()->json([
            'statusCode' => 200,
            'message' => "Available Products for store with ID $storeId",
            'result' => $product
        ], 200);
    }

    /**
     * Get single product
     *
     * @param  array  $data
     * @return JSON
     */
    protected function getSingleProduct(Request $request, $productId)
    {
        $product = ProductModel::findOrFail($productId);

        return response()->json([
            'statusCode' => 200,
            'message' => "Product with ID $productId",
            'result' => $product
        ], 200);
    }
}
