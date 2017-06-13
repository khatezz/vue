<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Usermanagement extends Eloquent
{
	protected $connection = 'mongodb';
    protected $collection = 'user_collection';
    protected $primareyKey = "_id";
    public function group(){
    	return $this->belongsTo('App\UserGroup','group_id');
    }
}
