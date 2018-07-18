<?php

namespace App\Http\Controllers\CP\Slider;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CamCyber\FileUploadController as FileUpload;
use App\Http\Controllers\CamCyber\FunctionController;

use App\Model\User\User;
use App\Model\Setup\Slider as Model;
class SliderController extends Controller
{
    protected $route; 
    public function __construct(){
        $this->route = "cp.service";
    }
    function validObj($id=0){
        $data = Model::find($id);
        if(empty($data)){
           echo "Invalide Object"; die;
        }
    }

    public function index(){
        $data = Model::select('*')->orderBy('id', 'DESC')->get();
        $limit      =   intval(isset($_GET['limit'])?$_GET['limit']:10); 
        $appends=array('limit'=>$limit);
        $key        =   isset($_GET['key'])?$_GET['key']:""; //Key can be name or phone
        if( $key != "" ){
            $appends['key'] = $key;
            $data = $data->where(function($query) use ($key){
                $query->where('name', 'like', '%'.$key.'%')->orWhereHas('user', function($query) use ($key){
                });
            });
            
        } 
        return view($this->route.'.index', ['route'=>$this->route, 'data'=>$data,'appends'=>$appends]);
    }
   
    public function create(){      
        return view($this->route.'.create', ['route'=>$this->route]);
    }
    public function store(Request $request) {
        $user_id        = Auth::id();
        $created_date   = date('Y-m-d H:i:s');
        $data = array(
                    'title'             =>  $request->input('title'),
                    'in_page'            =>  $request->input('inpage'), 
                    'description'       =>  $request->input('desc'),
                    'image'             =>  $request->input('image')
                );
        Session::flash('invalidData', $data );
        Validator::make(
                        $request->all(), 
                        [
                            'title'         => 'required',
                            'inpage'        => 'required',
                            'desc'          => ''        
                        ])->validate();
        
         //========================================================>>>> Start to create user
        // $user = new User();
        // $user->type_id = 2;
        // $user->password = bcrypt(uniqid());
        // //$user->created_at = now();
        // $user->save();
        //========================================================>>>> Start to create teacher
        $pages = new Model();
        $pages->title       = $request->input('title');
        $pages->in_page     = $request->input('inpage');
        $pages->description = $request->input('desc');
        $pages->creator_id  = $user_id;
        $pages->created_at  = $created_date;
       
       $image = FileUpload::uploadFile($request, 'image', 'uploads/product');
        if($image != ""){
            $pages->image = $image;
        }
         
        // dd($request->all());
        $pages->save();

        Session::flash('msg', 'Data has been Created!');
        return redirect(route($this->route.'.edit', $pages->id));
    }

    public function edit($id = 0){
        $this->validObj($id);
        $data = Model::find($id);
        return view($this->route.'.edit', ['route'=>$this->route, 'id'=>$id, 'data'=>$data]);
    }

    public function update(Request $request, $id){
        
        $user_id    = Auth::id();
        $now        = date('Y-m-d H:i:s');

        $data = array(
                    'title'         =>   $request->input('title'),
                    'in_page'       =>   $request->input('inpage'),
                    'description'   =>   $request->input('desc'),
                    'updater_id'    =>   $user_id,
                    'updated_at'    =>   $now
                );
        
        Validator::make(
                        $request->all(), 
                        [
                            'title' => 'required'
                        ])->validate();
       
        Model::where('id', $id)->update($data);
        Session::flash('msg', 'Data has been updated!' );
        return redirect()->back();
	}

    public function trash($id){
        Model::where('id', $id)->update(['deleter_id' => Auth::id()]);
        Model::find($id)->delete();
        Session::flash('msg', 'Data has been delete!' );
        return response()->json([
            'status' => 'success',
            'msg' => 'Award has been deleted'
        ]);
    }
    
}
