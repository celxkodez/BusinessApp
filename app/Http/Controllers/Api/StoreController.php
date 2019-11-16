<?php

namespace App\Http\Controllers\api;

use App\StoreModel;
use App\User;
use App\Http\Requests\Store;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Create a new Store.
     *
     * @param  array  $data
     * @return Json
     */
    protected function create(Store $request)
    {
        Auth::user()->store()->create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Your Store Has Been Created Successfully'
        ], 201);
    }

    /**
     * Update existing Store.
     *
     * @param  array  $data
     * @return Json
     */
    protected function update(Store $request, $storeId)
    {
        $updated = StoreModel::findOrFail($storeId)
            ->where('user_id', Auth::id())
            ->update($request->all());

        if ($updated == 0) {
            return response()->json([
                'statusCode' => 500,
                'message' => "Unable to update store. pleas try agin later"
            ], 500);
        }

        return response()->json([
            'statusCode' => 200,
            'message' => 'Your Store Details Has Been Updated Successfully'
        ], 200);
    }

    /**
     * get all Store a user has registered;
     *
     * @param  array  $data
     * @return Json
     */
    protected function getUserStores()
    {
        $store = StoreModel::where('user_id', Auth::id())
            ->withCount('products')
            ->get();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Stores user has registered',
            'result' => $store
        ], 200);
    }
}
