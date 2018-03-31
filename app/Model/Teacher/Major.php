<?php

namespace App\Model\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{	
	use SoftDeletes;
    protected $table = 'teachers_majors';

    public function teacher(){
        return $this->belongsTo('App\Model\Teacher\Teacher', 'teacher_id');
    }
    public function major(){
        return $this->belongsTo('App\Model\Setup\Major', 'major_id');
    }

}
