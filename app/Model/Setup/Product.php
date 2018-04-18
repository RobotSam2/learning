<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   	use SoftDeletes;
    protected $table = 'product';
    protected $dates = ['deleted_at'];

    public function product(){
        return $this->hasMany('App\Model\Product\Category', 'cate_id');
    }
}
