<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'Products';
    protected $cast = [
        'size' => 'array',
        'color' => 'array',
        'images' => 'array'
    ];

    protected $fillable = [
        'business_id',
        'name',
        'short_description',
        'brand_name',
        'price',
        'discount',
        'phone_number',
        'product_description',
        'product_specification',
        'shipping_information',
        'return_policy_1',
        'warranty_information',
        'return_policy_2',
    ];

    public function business()
    {
        return $this->belongsTo('App\BusinessModel');
    }
}
