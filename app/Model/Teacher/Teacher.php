<?php

namespace App\Model\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{	
	use SoftDeletes;
    protected $table = 'teachers';

    public function user(){
        return $this->belongsTo('App\Model\User\User', 'user_id');
    }

    public function province(){
        return $this->belongsTo('App\Model\Setup\Province', 'province_id');
    }
    public function sex(){
        return $this->belongsTo('App\Model\Setup\Sex', 'sex_id');
    }
    public function school(){
        return $this->belongsTo('App\Model\Setup\School', 'school_id');
    }
   
    public function year(){
        return $this->belongsTo('App\Model\Setup\Year', 'year_id');
    }

    public function majors(){
        return $this->belongsToMany('App\Model\Setup\Major', 'teachers_majors', 'teacher_id', 'major_id');
    }

    public function teacherMajors() {
        return $this->hasMany('App\Model\Teacher\Major', 'teacher_id');
    }
    

}
