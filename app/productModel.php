<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    protected $cast = [
        'size' => 'array',
        'color' => 'array',
        'images' => 'array'
    ];

    public function business()
    {
        return $this->belongsTo('App\BusinessModel');
    }
}
