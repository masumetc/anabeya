<?php

namespace App\Backend\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $primaryKey = 'category_id';
	protected $table= 'categories';
	
	public function products()
	{
		return $this->hasMany('App\Backend\Models\Shop\Product','product_id','product_id');
	}
}