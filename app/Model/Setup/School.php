<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
   	use SoftDeletes;
    protected $table = 'schools';
    protected $dates = ['deleted_at'];

    public function teachers(){
        return $this->hasMany('App\Model\Teacher\Teacher', 'school_id');
    }
}
