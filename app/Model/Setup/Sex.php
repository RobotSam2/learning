<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sex extends Model
{
   	use SoftDeletes;
    protected $table = 'sexes';
    protected $dates = ['deleted_at'];

    public function teachers(){
        return $this->hasMany('App\Model\Teacher\Teacher', 'sex_id');
    }
}
