<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page;

use Validator;
use Auth;


class AdminPageController extends Controller
{

	 public function __construct()
    {
        // $this->middleware('auth');
        $this->params = array(
        	'msg' => '',
			'user' => Auth::user()
			);
    }

	public function index(){

		$params['pages'] = Page::all();
		return view('admin.pages.list')->with($params);
	}
	
	public function create(){
		$params['action'] = "create_page";
		return view('admin.pages.form')->with($params);
	}
	
	public function store(Request $request){
	
		// Define Page fields rules
        $rules = array(
            'page_title'          	    => 'required|min:3',
            'permalink'              	=> 'required|min:3',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return view('admin.pages.form', $this->params);
        }

        $page = new Page;
        $page->name 		= 	$request->get('page_title');
        $page->title 		= 	$request->get('page_title');
        $page->slug 		= 	$request->get('permalink');
        $page->content 		= 	$request->get('content');
        $page->status 		= 	$request->get('active')? $request->get('active'): '';
        $page->save();

        $this->params['msg'] = 'Product successfully added!';
        return redirect('admin/pages/'.$page->id )->with($this->params);

		// dd($request->all());
	} 

	public function show($id){

		$page = Page::find($id);
		$params['page'] = $page;
		$params['action'] = "create_page";
		return view('admin.pages.form')->with($params);
	}

	public function edit($id){

	}

	public function update(){

	}

	public function destroy($id){

	}

	public function pageList(){

	}

}

?>