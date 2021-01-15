<?php

namespace App\Backend\Models\Brand;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $primaryKey = 'brand_id';
	protected $table= 'brands';
	
	public function user()
    {
        return $this->belongsTo('App\User','seller_id','id');
    }

}