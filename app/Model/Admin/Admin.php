<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{	
	use SoftDeletes;
    protected $table = 'admins';

    public function user(){
        return $this->belongsTo('App\Model\User\User', 'user_id');
    }
    

}
