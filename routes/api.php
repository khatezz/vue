<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('trial', function(){
	return 'Hello World';
});

Route::post('/createuser',[
	"uses" => 'UserManagement\UserManagementController@addUser',
]);

Route::get('/getusers',[
	'uses' => 'UserManagement\UserManagementController@getUsers'
]);

Route::post('/updateuser/{id}',[
	'uses' => 'UserManagement\UserManagementController@updateUser'
]);

Route::delete('/deleteuser/{id}',[
	'uses' => 'UserManagement\UserManagementController@deleteUser'
]);

Route::get('/getuser/{id}',[
	'uses' => 'UserManagement\UserManagementController@getUser'
]);

Route::post('/createusergroup',[
	'uses' => 'UserGroup\UserGroupController@createUserGroup'
]);

Route::get('/getusergroups',[
	'uses' => 'UserGroup\UserGroupController@getUserGroups'
]);

Route::delete('/deleteusergroup/{id}',[
	'uses' => 'UserGroup\UserGroupController@deleteUserGroup'
]);

Route::get('/getusergroup/{id}',[
	'uses' => 'UserGroup\UserGroupController@getUserGroup'
]);

Route::post('/updateusergroup/{id}',[
	'uses' => 'UserGroup\UserGroupController@updateUserGroup'
]);