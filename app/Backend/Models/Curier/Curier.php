<?php

namespace App\Backend\Models\Curier;

use Illuminate\Database\Eloquent\Model;

class Curier extends Model
{
	protected $primaryKey = 'curier_id';
	protected $table= 'curiers';
	
	public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}