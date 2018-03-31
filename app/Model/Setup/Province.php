<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
   	use SoftDeletes;
    protected $table = 'provinces';
    protected $dates = ['deleted_at'];

    public function teachers(){
        return $this->hasMany('App\Model\Teacher\Teacher', 'province_id');
    }
}	
