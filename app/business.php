<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    //
    public function user()
    {
      return $this->belongsTo('App\business');
    }
}
