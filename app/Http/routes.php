<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

// Route::get('/home', 'HomeController@index');

// Home page
// Route::get('/', [
//     'as'      => 'home',
//     'uses'    => 'PageController@index'
// ]);

// Catch all page controller (place at the very bottom)
Route::get('/{slug}', [
    'uses' => 'PageController@getPage' 
])->where('slug', '([A-Za-z0-9\-\/]+)');




/*
|--------------------
|	Admin Routes
|--------------------
*/
Route::group(['prefix' => 'admin'], function () {

    Route::Resource('pages', 'AdminPageController');
    Route::Resource('users', 'AdminUserController');
    Route::Resource('posts', 'AdminPostController');

});