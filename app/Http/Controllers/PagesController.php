<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PagesController extends Controller
{
    public function getIndex(){
		$projects=Project::orderBy('created_at','desc')->limit(4)->get();
		return view('pages/seeprojects')->withProjects($projects);
	}
}
