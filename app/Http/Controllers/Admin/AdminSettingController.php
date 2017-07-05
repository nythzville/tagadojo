<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Setting;
use App\Menu;

use Validator;
use Auth;


class AdminSettingController extends Controller
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

		$params['settings'] = Setting::all();
		$params['menus'] = Menu::all();
		return view('admin.settings.index')->with($params);
	}


}

?>