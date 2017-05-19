<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return view('Layout.page');
});

Route::group(['prefix' => 'admin'],function(){
	Route::get('/usergroups',[
		'uses' => 'HomeController@userGroups',
		'as'   => 'usergroups'
	]);

	Route::get('/fields',[
		'uses' => 'HomeController@fields',
		'as'   => 'fields'
	]);
});

Route::get('/chat', function(){
	return response()->json([1,2,3,4,5],200);
});

