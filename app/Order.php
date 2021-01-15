<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        public function refund()
    {
        return $this->hasone('App\Refound', 'order_id');
    }
}
