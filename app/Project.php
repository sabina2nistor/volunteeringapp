<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function department(){ //not departments

    	return $this->belongsTo('App\Department', 'department_id'); 
    }

   // protected $table ='tasks';

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }
}
