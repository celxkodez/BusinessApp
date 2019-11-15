<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => 'required|min:4',
            'description' => 'required|min:20',
            'type' => 'required',
            'area' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'LGA' => 'required',
            'country' => 'required',
            'year_started' => 'required'

        ];
    }
}
