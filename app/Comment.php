<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function project(){ //not categories

    	return $this->belongsTo('App\Project'); 
    }
}
