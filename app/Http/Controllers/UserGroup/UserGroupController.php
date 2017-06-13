<?php

namespace App\Http\Controllers\UserGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserGroup;
class UserGroupController extends Controller
{
    public function createUserGroup(Request $request){
    	$newusergroup = new UserGroup;
    	$this->setData($request, $newusergroup);

    	return $this->getUserGroups();
    }

    public function getUserGroups(){
    	return response(UserGroup::all(),200);
    }

    public function deleteUserGroup($id){
    	UserGroup::findorfail($id)->delete();
    	return $this->getUserGroups();
    }

    public function getUserGroup($id){
        return response(UserGroup::where('_id',$id)->first(), 200);
    }

    public function updateUserGroup(Request $request,$id){
        $usergroup = UserGroup::where("_id",$id)->first();
        $this->setData($request, $usergroup);
        return $this->getUserGroups();
    }

    public function setData($request, $usergroup){
        $usergroup->name = $request->name;
        $usergroup->description = $request->description;
        $usergroup->save();
    }
}
