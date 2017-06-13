<?php

namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class UserGroup extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'user_group_collection';
    protected $primaryKey = "_id";

    public function user(){
    	return $this->hasMany('App\UserManagement','_id');
    }
}
