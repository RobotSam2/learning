<?php

namespace App\Http\Controllers\CP\Auth;

use Auth;
use Session ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\CamCyber\AgentController as Agent;
use App\Http\Controllers\CamCyber\IpAddressController as IpAddress;

use App\Model\User\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'cp/alumnae';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware('guest:user,user.profile.edit', ['except' => 'logout']);
    }

    function showLoginForm(){

        return view('cp.auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password'); 
        $credentials['is_active'] = 1; 
        return $credentials;
    }

   
    //Create Logs
    protected function authenticated(Request $request, $user){
        //Log Information
        $agent      = new Agent;
        $info       = $agent::showInfo();
        $ipAddress  = new IpAddress;
        $ip         = $ipAddress::getIP(); 
        //Save Logs
        $log = new Log;
        $log->user_id   = $user->id;
        $log->ip        = $ip;
        $log->os        = $info['os'];
        $log->broswer   = $info['browser'];
        $log->version   = $info['version'];
        $log->save();
        
    }
   
    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('cp.auth.login');
    }
}
