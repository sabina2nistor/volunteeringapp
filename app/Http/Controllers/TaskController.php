<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
 
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex($slug){
        //fetch on the db based on slug
        $project = Project::where('slug','=', $slug)->first();
        $tasks = Task::all();
        $user = Auth::user()->id;
        
        $taskDistArray = DB::table('user_task')->select(DB::raw('task_id'))->where('user_id',$user)->get()->toArray();
        //dd($taskDistArray);

        $taskDist = [];
        for ($i=0; $i < count($taskDistArray); $i++) { 
            $taskDist[$i] = $taskDistArray[$i]->task_id;
        }
        
        return view('tasks.index', ['taskDist' => $taskDist])->withProject($project)->withTasks($tasks);
    }

    public function joinTask(Request $request, Task $task)
    {
        
        // $taskDist = DB::table('user_task')->select(DB::raw('task_id'))->get()->toArray();
        // dd($taskDist);
        
        
        $user = Auth::user();

        $task->users()->attach($user);

        Session::flash('success','task asignat cu success');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $project = Project::where('slug','=', $slug)->first();
        $tasks = Task::all();
        return view('tasks.create')->withTasks($tasks)->withProject($project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {   

        $this->validate($request, array(
            'name'         =>'required|max:255',
            'description'  =>'required|min:5|max:2000',
            
            
            ));


        $project = Project::where('slug','=', $slug)->first()->id;
       
        //$project = Project::find($project_id);

        $task = new Task;

        $task->name        = $request->name;
        $task->description  = $request->description;
        $task->project_id  = $project;
        

        $task->save();

        Session::flash('success','task success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $task = Task::find($id);
        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task =Task::Find($id);

        $this->validate($request, array(
            'name'=> 'required|max:255',
            'description'  =>'required|min:5|max:1000'

            ));

        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        Session::flash('success', ' success');
        return redirect()->route('projects.show', $task->project->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
