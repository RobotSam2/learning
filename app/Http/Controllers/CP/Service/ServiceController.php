<?php

namespace App\Http\Controllers\CP\Service;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CamCyber\FileUploadController as FileUpload;
use App\Http\Controllers\CamCyber\FunctionController;

use App\Model\User\User;
use App\Model\Setup\Service as Model;
use App\Model\Setup\Category;
class ServiceController extends Controller
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
        $category = Category::get();
        $appends=array('limit'=>$limit);
        $key        =   isset($_GET['key'])?$_GET['key']:""; //Key can be name or phone
        if( $key != "" ){
            $appends['key'] = $key;
            $data = $data->where(function($query) use ($key){
                $query->where('name', 'like', '%'.$key.'%')->orWhereHas('user', function($query) use ($key){
                });
            });
            
        }
        $c_id     =   intval(isset($_GET['c_id'])?$_GET['c_id']:0); 
        if($c_id != 0){
            $appends['c_id'] = $c_id;
            $data = $data->where('c_id', $c_id);
        } 
        return view($this->route.'.index', ['route'=>$this->route, 'data'=>$data,'appends'=>$appends]);
    }
   
    public function create(){      
        $data = Category::get();
        return view($this->route.'.create', ['route'=>$this->route, 'category'=>$data]);
    }
    public function store(Request $request) {
         $data = array(
                    'title'         =>  $request->input('title'),
                    'cate_id'       =>  $request->input('cate_id'), 
                    'price'         =>  $request->input('price'), 
                    'description'   =>  $request->input('desc'),
                    'pro_not'       =>  $request->input('not')
                );
        Session::flash('invalidData', $data );
        Validator::make(
                        $request->all(), 
                        [
                            'title'     => 'required',
                            'cate_id'   => 'required',
                            'price'     => 'required',
                            'desc'      => '',
                            'pro_not'   => '',                           
                        ])->validate();
        
         //========================================================>>>> Start to create user
        // $user = new User();
        // $user->type_id = 2;
        // $user->password = bcrypt(uniqid());
        // //$user->created_at = now();
        // $user->save();
        //========================================================>>>> Start to create teacher
        $product = new Model();
        // $teacher->user_id = $user->id;
        $product->title = $request->input('title');
        $product->cate_id = $request->input('cate_id');
        $product->price = $request->input('price');
        $product->description = $request->input('desc');
        $product->pro_not = $request->input('not');

       
        $feature = FileUpload::uploadFile($request, 'feature', 'uploads/product');
        if($feature != ""){
            $product->feature = $feature;
        }
         
        
        $product->save();

        Session::flash('msg', 'Data has been Created!');
        return redirect(route($this->route.'.edit', $product->id));
    }

    public function edit($id = 0){
        $this->validObj($id);
        $data = Model::find($id);
        $cate = Category::get();
        return view($this->route.'.edit', ['route'=>$this->route, 'id'=>$id, 'data'=>$data, 'categotry'=>$cate]);
    }

    public function update(Request $request, $id){
        
        $user_id    = Auth::id();
        $now        = date('Y-m-d H:i:s');

        $data = array(
                    'title' =>   $request->input('title'),
                    'updater_id' => $user_id,
                    'updated_at' => $now
                );
        
        Validator::make(
                        $request->all(), 
                        [
                            'name' => 'required'
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
