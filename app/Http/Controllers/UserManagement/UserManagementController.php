<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserManagement;
class UserManagementController extends Controller
{
    public function addUser(Request $request){
    	$newuser = new UserManagement;
    	$this->setData($newuser,$request);
    	return $this->getUsers();

    }

    public function getUsers(){
    	return response(UserManagement::with('group')->get(),200);
    }

    public function deleteUser($id){
    	UserManagement::findorfail($id)->delete();
    	return $this->getUsers();
    }

    public function getUser($id){
    	return response(UserManagement::where("_id",$id)->first(),200);
    }

    public function updateUser(Request $request, $id){
        $user = UserManagement::where('_id',$id)->first();
        $this->setData($user, $request);
        return $this->getUsers();
    }

    public function setData($user,$request){
        $user->group_id = $request->group_id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

}
