<?php
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
    use App\Model\User\User as Staff;
    use App\Model\Setup\Role as Role;
    use App\Model\Setup\Access as Access;
    use App\Model\Setup\Rate as Rate;
	function checkPermision($route){
        if(Auth::user()->position_id == 1){
           return True;
        }else{
            $permision = DB::table('permisions')->select('id')->where('route', $route)->first();
            if(count($permision) == 1){
                $permision_id = $permision->id;
                $user_id = Auth::id();
                $credentail = DB::table('users_permisions')->select('id')->where(['user_id'=>$user_id, 'permision_id'=>$permision_id])->first();
                if(count($credentail) == 1){
                    return True;
                }else{
                    return False;
                }
            }else{
                return False;
            }
        }
    }
    
    function user($user_id){
        $data = Staff::find($user_id);
        if(count($data) == 1){
            return $data->name;
        }else{
            return 'N/A';
        }
    }
    function rate(){
        $rate = Rate::select('id')->orderBy('id', 'DESC')->first();
        return $rate->id;
    }

   
?>