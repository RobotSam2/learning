<?php

namespace App\Http\Controllers\CP\Mail;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Http\Controllers\CamCyber\FunctionController;

use Illuminate\Support\Facades\Mail as MailSupport;
use App\Mail\WelcomeMail;

use App\Model\Applicant\Applicant as Applicant;

class MailController extends Controller
{
    protected $route; 
    public function __construct(){
        $this->route = "cp.mail";
    }
   
    public function index(){
        $next = $this->next();
        //dd($next); 
        return view($this->route.'.index', ['route'=>$this->route, 'next'=>$next]);
    }
    function next(){
        $next = Applicant::where('is_email_sent', Null)->orderBy('id', 'ASC')->first();
        return $next;
    }
    
    public function send(Request $request){
        $id = $request->input('id');
        $email = $request->input('email');

        MailSupport::to($email)->send(new WelcomeMail("MSG"));

        Applicant::where('id', $id)->update(['is_email_sent'=>1]);

        $next = $this->next();
        
        $registered = count(Applicant::get());
        $sent = count(Applicant::where('is_email_sent', 1)->get());

        return response()->json([
                'status' => 'success',
                'next' => $next, 
                'stat' => [
                            'registered' => $registered,
                            'sent' => $sent
                        ]
                
        ]);
       
    }
    public function stat(){
       
        $registered = count(Applicant::get());
        $sent = count(Applicant::where('is_email_sent', 1)->get());
        return response()->json([
                'registered' => $registered,
                'sent' => $sent
        ]);
       
    }
    
  
   
}
