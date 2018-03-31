<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   	use SoftDeletes;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];

     public function user(){
        return $this->belongsTo('App\Model\User\User', 'user_id');
    }

    public function maincate(){
        return $this->belongsTo('App\Model\Setup\Maincate', 'main_id');
    }
}
