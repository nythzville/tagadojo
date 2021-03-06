<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuItem;
use App\Setting;

use Validator;
use Auth;


class AdminMenuController extends Controller
{

	 public function __construct()
    {
    	
        $this->params = array(
        	'msg' => '',
			'user' => Auth::user()
			);
    }

	public function index(){
		
		$menus = Menu::all();	
		$menu_items = array();
		$current_menu = new Menu();

		// current menu
		$current_menu_id = Setting::where('name','current_menu')->first();

		if((!$current_menu_id) & (count($menus) > 0)){

			$current_menu_setting = new Setting;
			$current_menu_setting->name  	= 'current_menu';
			$current_menu_setting->value  	= 1;
			$current_menu_setting->author  	= 1;
			$current_menu_setting->status  	= 'Active';
			$current_menu_setting->save();

			$current_menu = Menu::find(1);
		}

		if($current_menu_id){
			$current_menu = Menu::find($current_menu_id->value);	
			$menu_items = $current_menu->getItems;
		}
		// get Menu list from settings
		
		$params['menus'] = $menus;		
		$params['current_menu'] = $current_menu;
		$params['current_menu_items'] = $menu_items;

		// dd($params);
		return view('admin.menus.index')->with($params);
	}
	
	public function create(){
		$params['action'] = "create_page";
		return view('admin.pages.form')->with($params);
	}
	
	public function store(Request $request){

		$menu = new Menu;
		$menu->name 			= $request->get('new-menu');
		$menu->title 			= $request->get('new-menu');
		$menu->save();

		// return response()->json(array('error' => false, 'menu_list' => $list));

        return redirect('admin/menus')->with($this->params);
		
	} 

	public function update($id, Request $request){

		// Update Menu items order
		if($request->get('_action') == 'menu_order'){
			$menu_order = $request->get('menu_order');

			// Re order items
			$order = 0;
			foreach ($menu_order as $menu_id) {
				$item = MenuItem::find($menu_id);
				
				if($item->order != $order){
					$item->order = $order;
					$item->save();
				}
				$order++;
			}

			return response()->json(array('error' => false, 'msg' => 'Menu Order was updated!', 'order' => $menu_order));
		}

		// Update Menu Name and Title
		if($request->get('_action') == 'edit_menu'){

			$new_name = $request->get('menu-edit-name');

			$menu = Menu::find($id);
			$menu->name = $new_name;
			$menu->title = $new_name;
			$menu->save();

			// dd($menu);
			return redirect('admin/menus')->with($this->params);
		}

		// Adding new Item to Menu
		if(($request->get('new-menu-item')) & ($request->get('new-menu-item-url'))){

			$menu_item = new MenuItem;
			$menu_item->name 			= $request->get('new-menu-item');
			$menu_item->title 			= $request->get('new-menu-item');
			$menu_item->menu 			= $id;
			$menu_item->level 			= 1;
			$menu_item->order 			= 1;
			$menu_item->url 			= $request->get('new-menu-item-url');
			$menu_item->save();

	        return redirect('admin/menus')->with($this->params);

		}
        return redirect('admin/menus')->with($this->params);
		
	}

	public function show($id){
		
		$menus = Menu::all();	
		$current_menu = Menu::find($id);

		if($current_menu){	
			$menu_items = $current_menu->getItems;
		}
		// get Menu list from settings
		
		$params['menus'] = $menus;		
		$params['current_menu'] = $current_menu;
		$params['current_menu_items'] = $menu_items;

		// dd($params);
		return view('admin.menus.index')->with($params);
	}

	public function edit($id){

	}

	
	public function destroy($id){
		$menu = Menu::find($id);
		$menu->delete();
        return redirect('admin/menus')->with($this->params);

	}

}

?>