<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refound extends Model
{
     public function order()
    {
        return $this->belongsTo('App\Order', 'id');
    }
}
