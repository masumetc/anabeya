<?php

namespace App\Backend\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $primaryKey = 'product_image_id';
	protected $table= 'product_image';
	protected $fillable = ['name','image'];
	public function product()
    {
        return $this->belongsTo('App\Backend\Models\Shop\Product','product_id','product_id');
    }
}