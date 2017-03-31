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
}

