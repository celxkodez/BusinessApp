<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'store_id' => 'required',
            'name' => 'required',
            'short_description' => 'required',
            'brand_name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'phone_number' => 'required',
            // 'size' => 'required',
            // 'color' => 'required',
            'product_description' => 'required',
            'product_specification' => 'required',
            'shipping_information' => 'required',
            'return_policy_1' => 'required',
            'warranty_information' => 'required',
            'return_policy_2' => 'required',
            // 'images' => 'required'
        ];
    }
}
