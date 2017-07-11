<?php

Route::auth();

/*
|--------------------
|	Admin Routes
|--------------------
*/
Route::group(['prefix' => 'admin', 'namespace'=> 'Admin', 'middleware' => 'admin'], function () {

	Route::Resource('posts', 'AdminPostController');
	
	Route::Resource('pages', 'AdminPageController');

	Route::Resource('files', 'AdminFileController');

	Route::Resource('users', 'AdminUserController');
	
	Route::Resource('menus', 'AdminMenuController');

	Route::Resource('widgets', 'AdminWidgetController');

	Route::Resource('settings', 'AdminSettingController');

	Route::post('menus/add', 'AdminMenuController@addMenu');
	
	
	// Route::post('menus/store', 'AdminMenuController@store');


});


Route::get('/', 'HomeController@index');


// Route::get('/home', 'HomeController@index');

// Home page
// Route::get('/', [
//     'as'      => 'home',
//     'uses'    => 'PageController@index'
// ]);

// Catch all page controller (place at the very bottom)
// Route::get('/{slug}', [
//     'uses' => 'PageController@getPage' 
// ])->where('slug', '([A-Za-z0-9\-\/]+)');