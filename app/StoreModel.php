<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StoreModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type', 'area', 'address', 'city', 'state', 'LGA', 'country', 'year_started'
    ];
    protected $hidden = ['user_id'];

    protected $table = 'store';


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\ProductModel', 'store_id');
    }
}
