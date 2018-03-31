<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   	use SoftDeletes;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    public function category(){
        return $this->hasMany('App\Model\Category\Category', 'cate_id');
    }
}