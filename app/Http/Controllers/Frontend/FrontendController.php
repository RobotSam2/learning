<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Mail as MailSupport;
use App\Mail\WelcomeMail;

use App\Model\Teacher\Teacher as Teacher;
use App\Model\User\User;
use App\Model\Setup\Province;
use App\Model\Setup\Sex;
use App\Model\Setup\School;
use App\Model\Setup\Major;
use App\Model\Setup\Year;

class FrontendController   extends Controller
{
    protected $route;
    public function __construct(){
        $this->route = "";
    }
    
    public function index(){
         $data       =   Teacher::select('*');
        $limit      =   intval(isset($_GET['limit'])?$_GET['limit']:100); 
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
        
      
        $data= $data->orderBy('name', 'DESC')->paginate($limit);

        //dd($data);

        $provinces = Province::get();
        $sexes = Sex::get();
        $years = Year::get();
        $schools = School::get();
        return view('frontend.index', ['route'=>$this->route, 'data'=>$data,'appends'=>$appends, 'sexes'=>$sexes, 'provinces'=>$provinces, 'years'=>$years, 'schools'=>$schools]);
       
    }
   

    
   
    

   
}
