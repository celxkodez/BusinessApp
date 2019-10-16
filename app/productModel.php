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
}
