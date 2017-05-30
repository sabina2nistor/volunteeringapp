<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Charts;
use Auth;
use Mail;
use Session;
use DB;


class PagesController extends Controller
{
    public function getIndex(){

    	$search = \Request::get('search');
    	$projects = DB::table('projects')
            ->join('project_tag', 'projects.id', '=', 'project_tag.project_id')
            ->join('tags', 'project_tag.tag_id', '=', 'tags.id')
            ->select('projects.*')->distinct()->where('tags.name','like','%'.$search.'%')->orderBy('id','desc')->paginate(6);
        
        //$projects = Project::where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(6);
        //DB::table('project_tag')->select(DB::raw('tag_id'))->where('user_id',$user)->get()
        
		return view('vapp.seeprojects')->withProjects($projects);
	}

	public function getSingle($slug){
		
		$project = Project::where('slug','=', $slug)->first();

		return view('vapp.single')->withProject($project);
	}

	public function getStatistics(){

		//$number = Post::all()->count();
		$idUser = Auth::user()->id;

		$tasksUsed = DB::table('user_task')
            ->join('tasks', 'tasks.id', '=', 'user_task.task_id')
            ->join('projects', 'projects.id', '=', 'tasks.project_id')
            ->select('projects.title')->where('user_task.user_id',$idUser)->get();

        $tasksNumber = DB::table('user_task')
            ->join('tasks', 'tasks.id', '=', 'user_task.task_id')
            ->join('projects', 'projects.id', '=', 'tasks.project_id')
            ->select(DB::raw('count(tasks.project_id) as num'))->where('user_task.user_id',$idUser)->groupBy(DB::raw('projects.title'))->get();

           // dd($tasksNumber->toArray());

		$chart = Charts::create('donut', 'morris')
            // ->view('custom.line.chart.view') // Use this if you want to use your own template
            ->title('La cate taskuri te-ai inscris pentru fiecare proiect')
            ->labels($tasksUsed->pluck('title')->toArray())
            ->values($tasksNumber->pluck('num')->toArray())
            ->dimensions(300,300)
            ->responsive(false);

       


		return view('vpages/statistics', ['chart' => $chart]);
	}

	public function getContact(){
		return view('vpages/contact');
	}

	public function getAbout(){
		return view('vpages/about');
	}

	public function postContact(Request $request){
		$this->validate($request, [
			'email' => 'required|email',
			'subject' =>'min:3',
			'message' => 'min:10',]);

		$data= array(
			'email' => $request->email, 
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact',$data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('sabina@yahoo.com');
			$message->subject($data['subject']);
		});

		Session::flash('success','Mesaj trimis cu succes');

		return redirect()->back();
	}

}
