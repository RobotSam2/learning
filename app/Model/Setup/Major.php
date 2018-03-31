<?php

namespace App\Model\Setup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
   	use SoftDeletes;
    protected $table = 'majors';
    protected $dates = ['deleted_at'];

    public function teachers(){
        return $this->belongsToMany('App\Model\Teacher\Teacher', 'teachers_majors', 'major_id', 'teacher_id');
    }

    public function majorTeachers() {
        return $this->hasMany('App\Model\Teacher\Major', 'major_id');
    }
}
