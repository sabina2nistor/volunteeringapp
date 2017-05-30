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

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function tags(){ 

        return $this->belongsToMany('App\Tag'); 
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
