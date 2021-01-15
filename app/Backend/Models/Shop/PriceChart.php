<?php

namespace App\Backend\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class PriceChart extends Model
{
	protected $primaryKey = 'price_chart_id';
	protected $table= 'price_charts';
	protected $fillable = ['color','color_image','size','stock','regular_price','comission','discount_price'];
	public function product()
	{
		return $this->belongsTo('App\Backend\Models\Product\Product','product_id','product_id');
	}
	
}