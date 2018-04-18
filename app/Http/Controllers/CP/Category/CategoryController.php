<?php

namespace App\Http\Controllers\CP\Category;

use Auth;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CamCyber\FunctionController;

use App\Model\Setup\Category;
use App\Model\Setup\Maincate;

class CategoryController extends Controller
{
    protected $route; 
    public function __construct(){
        $this->route = "cp.category";
    }
    function validObj($id=0){
        $data = Category::find($id);
        if(empty($data)){
           echo "Invalide Object"; die;
        }
    }

    public function index(){
        $data = Category::select('*')->orderBy('id', 'DESC')->get();
        
        return view($this->route.'.index', ['route'=>$this->route, 'data'=>$data]);
    }
   
    public function create(){
        $maincate = Maincate::get();
        return view($this->route.'.create' , ['route'=>$this->route, 'maincate'=>$maincate]);
    }
    public function store(Request $request) {
        $user_id    = Auth::id();
        $now        = date('Y-m-d H:i:s');

        $data = array(
                    'name'       => $request->input('name'),
                    'main_id'    => $request->input('main_id'),
                    'creator_id' => $user_id,
                    'created_at' => $now
                );
        
        Session::flash('invalidData', $data );
        Validator::make(
                        $request->all(), 
                        [
                            'name'      => 'required',
                            'main_id'   => 'exists:main_categoires,id',
                        ])->validate();
       
		$id=Category::insertGetId($data);
        Session::flash('msg', 'Data has been Created!');
		return redirect(route($this->route.'.edit', $id));
    }

    public function edit($id = 0){
        $this->validObj($id);
        $maincate = Maincate::get();        
        $data = Category::find($id);
        return view($this->route.'.edit', ['route'=>$this->route, 'id'=>$id, 'data'=>$data, 'maincate'=>$maincate]);
    }

    public function update(Request $request, $id){
        
        $user_id    = Auth::id();
        $now        = date('Y-m-d H:i:s');

        $data = array(
                    'name' =>   $request->input('name'),
                    'main_id'=> $request->input('main_id'),
                    'updater_id' => $user_id,
                    'updated_at' => $now
                );
        
        Validator::make(
                        $request->all(), 
                        [
                            'name' => 'required',
                            'main_id'=> 'required',
                        ])->validate();
       
        Category::where('id', $id)->update($data);
        Session::flash('msg', 'Data has been updated!' );
        return redirect()->back();
	}

    public function trash($id){
        Category::where('id', $id)->update(['deleter_id' => Auth::id()]);
        Category::find($id)->delete();
        Session::flash('msg', 'Data has been delete!' );
        return response()->json([
            'status' => 'success',
            'msg' => 'Award has been deleted'
        ]);
    }
    
}
