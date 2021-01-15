<?php

namespace App\Backend\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $primaryKey = 'product_id';
	protected $table= 'products';
	
	public function category()
	{
		return $this->belongsTo('App\Backend\Models\Category\Category','category_id','category_id');
	}

	public function brand()
	{
		return $this->belongsTo('App\Backend\Models\Brand\Brand','brand_id','brand_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User','seller_id','id');
	}

	public function productImages()
	{
		return $this->hasMany('App\Backend\Models\Shop\ProductImage','product_id','product_id');
	}

	public function priceCharts()
	{
		return $this->hasMany('App\Backend\Models\Shop\PriceChart','product_id','product_id');
	}
	
	
	//for review
	 public function reviews()
    {
        return $this->hasMany('App\Review', 'product_id');
    }
}