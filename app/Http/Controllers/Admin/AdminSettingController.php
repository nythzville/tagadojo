<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Setting;
use App\Menu;
use App\Page;

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
		$params['pages'] = Page::all();
		$params['settings'] = $settings;

		// dd($params);
		return view('admin.settings.index')->with($params);
	}

	public function store(Request $request){

		if($request->get('_action') == 'save_site_settings'){

			$site_name = Setting::where('name', 'site_name')->first();
			$tagline = Setting::where('name', 'tagline')->first();
			$meta_description = Setting::where('name', 'meta_description')->first();

			if(!$site_name){
				$site_name = new Setting;
			}
			// Site Name Settings
			$site_name->name = 'site_name';
			$site_name->value = $request->get('site_name');
			$site_name->author = 1;
			$site_name->status = 'Active';
			$site_name->save();

			if(!$tagline){
				$tagline = new Setting;
			}
			// Tagline Settings
			$tagline->name = 'tagline';
			$tagline->value = $request->get('tagline');
			$tagline->author = 1;
			$tagline->status = 'Active';
			$tagline->save();

			if(!$meta_description){
				$meta_description = new Setting;
			}
			// Meta Description Settings
			$meta_description->name = 'meta_description';
			$meta_description->value = $request->get('meta_description');
			$meta_description->author = 1;
			$meta_description->status = 'Active';
			$meta_description->save();

			return redirect('admin/settings')->with($this->params);
			

		}

		// Front Page Display settings
		if($request->get('_action') == 'save_frontpage_settings'){

			$frontpage = Setting::where('name', 'frontpage')->first();
			$blogpage = Setting::where('name', 'blogpage')->first();

			if(!$frontpage){
				$frontpage = new Setting;
			}
			// Frontpage Settings
			$frontpage->name = 'frontpage';
			$frontpage->value = $request->get('frontpage');
			$frontpage->author = 1;
			$frontpage->status = 'Active';
			$frontpage->save();

			if(!$blogpage){
				$blogpage = new Setting;
			}
			// Blogpage Settings
			$blogpage->name = 'blogpage';
			$blogpage->value = $request->get('blogpage');
			$blogpage->author = 1;
			$blogpage->status = 'Active';
			$blogpage->save();

			return redirect('admin/settings')->with($this->params);

		}

	}


}

?>