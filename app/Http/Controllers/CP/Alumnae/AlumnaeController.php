<?php

namespace App\Http\Controllers\CP\Alumnae;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CamCyber\FileUploadController as FileUpload;
use App\Http\Controllers\CamCyber\FunctionController;

use App\Model\Teacher\Teacher as Teacher;
use App\Model\User\User;
use App\Model\Setup\Province;
use App\Model\Setup\Sex;
use App\Model\Setup\School;
use App\Model\Setup\Major;
use App\Model\Setup\Year;

class AlumnaeController   extends Controller
{
    protected $route;
    public function __construct(){
        $this->route = "cp.alumnae";
    }
    
    public function index(){
        $data       =   Teacher::select('*');
        $limit      =   intval(isset($_GET['limit'])?$_GET['limit']:10); 
        $appends=array('limit'=>$limit);
        

       
        $key        =   isset($_GET['key'])?$_GET['key']:""; //Key can be name or phone
        if( $key != "" ){
            $appends['key'] = $key;
            $data = $data->where(function($query) use ($key){
                $query->where('name', 'like', '%'.$key.'%')->orWhereHas('user', function($query) use ($key){
                    $query->where('phone', 'like', '%'.$key.'%');
                });
            });
            
        }

        $sex_id     =   intval(isset($_GET['sex_id'])?$_GET['sex_id']:0); 
        if($sex_id != 0){
            $appends['sex_id'] = $sex_id;
            $data = $data->where('sex_id', $sex_id);
        }

        $province_id     =   intval(isset($_GET['province_id'])?$_GET['province_id']:0); 
        if($province_id != 0){
            $appends['province_id'] = $province_id;
            $data = $data->where('province_id', $province_id);
        }

    

        $school_id     =   intval(isset($_GET['school_id'])?$_GET['school_id']:0); 
        if($school_id != 0){
            $appends['school_id'] = $school_id;
            $data = $data->where('school_id', $school_id);
        }

        $year_id     =   intval(isset($_GET['year_id'])?$_GET['year_id']:0); 
        if($year_id != 0){
            $appends['year_id'] = $year_id;
            $data = $data->where('year_id', $year_id);
        }        
        
        $from=isset($_GET['from'])?$_GET['from']:"";
        $till=isset($_GET['till'])?$_GET['till']:"";
        if(FunctionController::isValidDate($from)){
            if(FunctionController::isValidDate($till)){
                $appends['from'] = $from;
                $appends['till'] = $till;

                $from .=" 00:00:00";
                $till .=" 23:59:59";

                $data = $data->whereBetween('created_at', [$from, $till]);
            }
        }

        $data= $data->orderBy('created_at', 'DESC')->paginate($limit);

        //dd($data);

        $provinces = Province::get();
        $sexes = Sex::get();
        $years = Year::get();
        $schools = School::get();
        return view($this->route.'.index', ['route'=>$this->route, 'data'=>$data,'appends'=>$appends, 'sexes'=>$sexes, 'provinces'=>$provinces, 'years'=>$years, 'schools'=>$schools]);
    }
    
    public function create(){
        $provinces = Province::get();
        $sexes = Sex::get();
        $years = Year::get();
        $schools = School::get();
        return view($this->route.'.add', ['route'=>$this->route.'.add', 'sexes'=>$sexes, 'provinces'=>$provinces, 'years'=>$years, 'schools'=>$schools]);
    }
    
    public function store(Request $request) {
        $data = array(
                    'name' =>   $request->input('name'),
                    'sex_id' =>  $request->input('sex_id'), 
                    'dob' =>  $request->input('dob'),
                    'phone' => $request->input('phone'),
                    'school_id' =>  $request->input('school_id'), 
                    'year_id' =>  $request->input('year_id'), 
                    'workplace' =>  $request->input('workplace'), 
                    'province_id' =>  $request->input('province_id')
                );
        Session::flash('invalidData', $data );
        Validator::make(
                        $request->all(), 
                        [
                            'name' => 'required',
                            'sex_id' => 'exists:sexes,id',
                            'dob' => 'required',
                            'phone' => [
                                            'required',
                                            'regex:/(^[0][0-9].{7}$)|(^[0][0-9].{8}$)/', 
                                            'unique:users,phone'
                                        ],
                            'school_id' => 'exists:schools,id',
                            'year_id' => 'exists:years,id', 
                            'workplace' => 'required',
                            'province_id' => 'exists:provinces,id'
                        ])->validate();
        
         //========================================================>>>> Start to create user
        $user = new User();
        $user->type_id = 2;
        $user->phone = $request->input('phone');
        $user->password = bcrypt(uniqid());
        //$user->created_at = now();
        $user->save();
        //========================================================>>>> Start to create teacher
        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->name = $request->input('name');
        $teacher->sex_id = $request->input('sex_id');
        $teacher->dob = $request->input('dob');
        $teacher->school_id = $request->input('school_id');
        $teacher->year_id = $request->input('year_id');
        $teacher->workplace = $request->input('workplace');
        $teacher->province_id = $request->input('province_id');
       
        $avatar = FileUpload::uploadFile($request, 'avatar', 'uploads/alumnae');
        if($avatar != ""){
            $teacher->avatar = $avatar;
        }
        
        $teacher->save();

        Session::flash('msg', 'Data has been Created!');
        return redirect(route($this->route.'.edit', $teacher->id));
    }

    public function edit($id=0){
        $provinces = Province::get();
        $sexes = Sex::get();
        $years = Year::get();
        $schools = School::get();
        $majors = Major::get();

        $data = Teacher::find($id);
        return view($this->route.'.edit', ['route'=>$this->route.'.edit', 'data'=>$data, 'majors'=>$majors, 'sexes'=>$sexes, 'provinces'=>$provinces, 'years'=>$years, 'schools'=>$schools]);
    }

     public function update(Request $request, $id=0) {

        Validator::make(
                        $request->all(), 
                        [
                            'name' => 'required',
                            'sex_id' => 'exists:sexes,id',
                            'dob' => 'required',
                            'phone' => [
                                            'required',
                                            'regex:/(^[0][0-9].{7}$)|(^[0][0-9].{8}$)/', 
                                            Rule::unique('users')->ignore($request->input('user_id'))
                                        ],
                            'school_id' => 'exists:schools,id',
                            'year_id' => 'exists:years,id', 
                            'workplace' => 'required',
                            'province_id' => 'exists:provinces,id'
                        ])->validate();
        
         //========================================================>>>> Start to update user
        $user = User::find($request->input('user_id'));
        $user->phone = $request->input('phone');
        //$user->created_at = now();
        $user->save();
        //========================================================>>>> Start to update teacher
        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name');
        $teacher->sex_id = $request->input('sex_id');
        $teacher->dob = $request->input('dob');
        $teacher->school_id = $request->input('school_id');
        $teacher->year_id = $request->input('year_id');
        $teacher->workplace = $request->input('workplace');
        $teacher->province_id = $request->input('province_id');

        $avatar = FileUpload::uploadFile($request, 'avatar', 'uploads/alumnae');
        if($avatar != ""){
            $teacher->avatar = $avatar;
        }
        
        $teacher->save();

        Session::flash('msg', 'Data has been updated!');
        return redirect(route($this->route.'.edit', $id));
    }

    public function checkMajor(Request $request){
        $teacher_id = $request->input('teacher_id');
        $major_id = $request->input('major_id');

        $exist = Teacher::find($teacher_id)->teacherMajors()->where('major_id', $major_id)->first();
        if(count($exist)==0){
            $data = array(
                            'teacher_id'=>$teacher_id, 
                            'major_id'=>$major_id, 
                            'creator_id'=>Auth::id()
                            );
            Teacher::find($teacher_id)->teacherMajors()->insert($data);
             return response()->json([
                    'status' => 'success',
                    'msg' => 'Major has been added'
                ]);
        }else{
             $data = array(
                            'teacher_id'=>$teacher_id, 
                            'major_id'=>$major_id
                            );
            Teacher::find($teacher_id)->teacherMajors()->where($data)->delete();
            return response()->json([
                    'status' => 'success',
                    'msg' => 'Major has been removed'
                ]);
        }
    }

    public function trash($id){
        Teacher::where('id', $id)->update(['deleter_id' => Auth::id()]);
        Teacher::where('id', $id)->delete();
        Session::flash('msg', 'Data has been delete!' );
        return response()->json([
            'status' => 'success',
            'msg' => 'Renter has been deleted'
        ]);
    }

   
    

   
}
