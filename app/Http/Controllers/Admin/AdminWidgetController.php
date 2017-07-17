<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Setting;
use App\Widget;


class AdminWidgetController extends Controller
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
        $widgets = Widget::all();
        $this->params['widgets'] = $widgets;
        return view('admin.widgets.index')->with($this->params);
        
    }

    public function create(){

        return view('admin.widgets.create')->with($this->params);

    }

    public function store(Request $request){

        
    }
}
