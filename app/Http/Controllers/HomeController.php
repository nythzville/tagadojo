<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Setting;
use App\Page;
use App\Menu;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->params = array(
            'msg' => '',
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings_obj = Setting::all();
        $settings = array();

        foreach ($settings_obj as $setting_obj) {
            $settings[$setting_obj->name] = $setting_obj->value;
        }

        $this->params['settings'] = $settings;
        $this->params['page'] = Page::find(intval($settings['frontpage']));
        $this->params['primary_menu'] = Menu::find(intval($settings['primary_menu']));

        return view('themes.finance.index')->with($this->params);
        
    }
}
