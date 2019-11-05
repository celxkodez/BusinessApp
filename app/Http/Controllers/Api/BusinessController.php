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
     * @return Json
     */
    protected function create(Business $request)
    {
        Auth::user()->business()->create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Your Business Has Been Created Successfully'
        ], 201);
    }

    /**
     * Update existing Business.
     *
     * @param  array  $data
     * @return Json
     */
    protected function update(Business $request, $businessId)
    {
        $updated = BusinessModel::where('id', $businessId)
            ->where('user_id', Auth::id())
            ->update($request->all());

        if ($updated == 0) {
            return response()->json([
                'statusCode' => 404,
                'message' => "Business with ID $businessId not found, or does not belong to user"
            ], 404);
        }

        return response()->json([
            'statusCode' => 200,
            'message' => 'Your Business Has Been Updated Successfully'
        ], 200);
    }

    /**
     * get all business a user has registered;
     *
     * @param  array  $data
     * @return Json
     */
    protected function getUserBusiness()
    {
        $business = BusinessModel::where('user_id', Auth::id())
            ->withCount('products')
            ->get();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Businesses user has registered',
            'result' => $business
        ], 200);
    }
}
