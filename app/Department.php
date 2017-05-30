<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table ='departments';

    public function projects()
    {
    	return $this->hasMany('App\Project');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function association(){ //not associations

    	return $this->belongsTo('App\Association', 'association_id'); 
    }

}

