<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile', 'user_address', 'user_country', 'user_city', 'user_zip', 'role','customer_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function curier()
    {
        return $this->hasOne('App\Backend\Models\Curier\Curier','user_id','id');
    }

    public function curierUnits()
    {
        return $this->hasMany('App\Backend\Models\Curier\CurierUnit','user_id','id');
    }

    public function brands()
    {
        return $this->hasMany('App\Backend\Models\Brand\Brand','seller_id','id');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment', 'seller_id');
    }

}
