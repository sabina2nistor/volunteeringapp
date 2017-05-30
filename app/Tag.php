<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     public function projects(){ //not categories

    	return $this->belongsToMany('App\Project'); 
    }

}
