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

		$settings_obj = Setting::all();
		$settings = array();

		foreach ($settings_obj as $setting_obj) {
            $settings[$setting_obj->name] = $setting_obj->value;
        }

		$params['menus'] = Menu::all();
		$params['settings'] = $settings;

		// dd($params);
		return view('admin.settings.index')->with($params);
	}


}

?>