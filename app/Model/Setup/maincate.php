<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maincate extends Model
{
   	use SoftDeletes;
    protected $table = 'main_categoires';
    protected $dates = ['deleted_at'];

    public function category(){
        return $this->hasMany('App\Model\Setup\Category', 'main_id');
    }
}
