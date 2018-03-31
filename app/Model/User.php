<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    protected $table = 'users';
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
