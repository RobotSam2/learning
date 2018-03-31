<?php

namespace App;

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
}




// forom env file  ***

// MAILGUN_SECRET=key-a11b252597f1035bbe8b7349010ba5bc
// MAIL_FROM_ADDRESS=scholarship@edvise.asia
// MAIL_FROM_NAME="Xiamen Scholarship Programs"
