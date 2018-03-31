<?php

namespace App\Model\User;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function type(){
        return $this->belongsTo('App\Model\User\Type');
    }
   

    public function logs() {
        return $this->hasMany('App\Model\User\Log', 'user_id');
    }



}
