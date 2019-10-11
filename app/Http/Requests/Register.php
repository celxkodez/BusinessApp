<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'firstname' => 'required|min:4',
            'lastname' => 'required|min:4',
            'email' => 'required|unique:users|max:255',
            'gender' => 'required|min:4',
            'birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'LGA' => 'required',
            'country' => 'required',
            'password' => 'required',
        ];
    }
}
