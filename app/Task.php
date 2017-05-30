<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	public $table = 'tasks';

    public function project(){ //not projects

    	return $this->belongsTo('App\Project'); 
    }

    public function status(){ //not statuses

    	return $this->belongsTo('App\Status', 'status_id'); 
    }

     public function users(){ 

    	return $this->belongsToMany('App\User', 'user_task'); 
    }
}
