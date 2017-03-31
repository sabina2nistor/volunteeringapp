<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PagesController extends Controller
{
    public function getIndex(){
		$projects=Project::orderBy('created_at','desc')->get();
		return view('vapp/seeprojects')->withProjects($projects);
	}

	public function getSingle($slug){
		//fetch on the db based on slug
		$project = Project::where('slug','=', $slug)->first();

		//return a view
		return view('vapp.single')->withProject($project);
	}
}
