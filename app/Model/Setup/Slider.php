<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
   	use SoftDeletes;
    protected $table = 'service_page';
    protected $dates = ['deleted_at'];


}
