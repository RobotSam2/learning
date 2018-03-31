<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
   	use SoftDeletes;
    protected $table = 'years';
    protected $dates = ['deleted_at'];

    public function teachers(){
        return $this->hasMany('App\Model\Teacher\Teacher', 'year_id');
    }
}
