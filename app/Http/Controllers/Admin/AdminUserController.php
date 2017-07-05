<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

use Validator;
use Auth;
use Hash;

class AdminUserController extends Controller
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

		$params['users'] = User::all();
		return view('admin.users.list')->with($params);
	}
	
	public function create(){
		$params['action'] = "create_user";
		return view('admin.users.form')->with($params);
	}
	
	public function store(Request $request){
	
		// Define User fields rules
        $rules = array(
            'username'          	    => 'required|min:6',
            'email'              		=> 'required|email|unique:users',  
            'password' 					=> 'required|min:6|confirmed',
            'password_confirmation' 	=> 'required',         

            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return view('admin.users.form', $this->params);
        }

	     // Create New User
        $user = New User;
        $user->name   	                = $request->input('username');
        $user->email                    = $request->input('email');
        $user->password                 = Hash::make($request->input('password') );
        $user->save();

         $this->params['msg'] = 'User successfully added!';
        // return redirect('/users')->with($this->params);
        return redirect('admin/users')->with('msg',$this->params['msg']);
	} 

	public function show($id){

		$user = User::find($id);
		$params['user'] = $user;
		$params['action'] = "show_user";
		return view('admin.users.form')->with($params);
	}

	public function edit($id){

		$user = User::find($id);
		$params['user'] = $user;
		$params['action'] = "show_user";
		return view('admin.users.form')->with($params);

	}

	public function update($id, Request $request){
		// Define employee fields rules
        $rules = array(
            'username'          => 'required|min:6',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password' ,
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            $user = User::find($id);
            $this->params["user"] = $user;
            $this->params["action"] = "edit_user";
            $this->params["method"] = "PUT";
            return view('admin.users.form',$this->params);
        }

        $user = User::find($id);
        $user->name                     = $request->input('username');
        $user->email                    = $request->input('email');
        $user->password                 = Hash::make($request->input('password') );
        $user->save();
        
        $this->params['error'] = false;
        $this->params['msg'] = 'User successfully updated!';

        return redirect('admin/users')->with('msg',$this->params['msg']);
	}

	public function destroy($id){

	}

	public function userList(){

	}
}

?>