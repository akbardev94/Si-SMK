<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class User extends Authenticatable
class User extends Authenticatable
{
    use Notifiable;
	
	use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'status', 'gender', 'data_pengguna_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function datapengguna()
    {
        return $this->belongsTo('App\data_pengguna', 'data_pengguna_id', 'id');
    }

    public function informasi()
    {
        return $this->hasMany(\App\Informasi::class);
    }

}
