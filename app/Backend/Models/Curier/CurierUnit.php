<?php

namespace App\Backend\Models\Curier;

use Illuminate\Database\Eloquent\Model;

class CurierUnit extends Model
{
	protected $primaryKey = 'curier_unit_id';
	protected $table= 'curier_units';
	protected $fillable = ['curier_unit','unit_charge'];
	public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}