<?php

namespace App\Http\Controllers\CP\Product;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CamCyber\FunctionController;

use App\Model\Setup\Product as Model;
use App\Model\Setup\Category;
class ProductController extends Controller
{
    protected $route; 
    public function __construct(){
        $this->route = "cp.product";
    }
    function validObj($id=0){
        $data = Model::find($id);
        if(empty($data)){
           echo "Invalide Object"; die;
        }
    }

    public function index(){
        $data = Model::select('*')->orderBy('id', 'DESC')->get();
        
        return view($this->route.'.index', ['route'=>$this->route, 'data'=>$data]);
    }
   
    public function create(){
        $category = Category::get();
        return view($this->route.'.create', ['route'=>$this->route.'.create', 'category'=>$category]);    
    }
    public function store(Request $request) {
         $data = array(
                    'title' =>   $request->input('title'),
                    'cate_id' =>  $request->input('category'), 
                    'price' =>  $request->input('price'), 
                    'description' =>  $request->input('desc'),
                    'pro_not' =>  $request->input('not')
                );
        Session::flash('invalidData', $data );
        Validator::make(
                        $request->all(), 
                        [
                            'title' => 'required',
                            'cate_id' => 'required',
                            'price' => 'required',
                            'desc' => '',
                            'pro_not' => '',                           
                        ])->validate();
        
         //========================================================>>>> Start to create user
        $user = new User();
        $user->type_id = 2;
        $user->password = bcrypt(uniqid());
        //$user->created_at = now();
        $user->save();
        //========================================================>>>> Start to create teacher
        $product = new Product();
        $product->cate_id = $category->id;
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('desc');
        $product->pro_not = $request->input('not');

       
        $avatar = FileUpload::uploadFile($request, 'avatar', 'uploads/alumnae');
        if($avatar != ""){
            $teacher->avatar = $avatar;
        }
        
        $teacher->save();

        Session::flash('msg', 'Data has been Created!');
        return redirect(route($this->route.'.edit', $teacher->id));
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
                    'name' =>   $request->input('name'),
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
