<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;
use Auth;
class TaskController extends Controller
{
 //    public function __construct(Task $task)
 // {
 //    $this->task = $task;
 //    $this->id = $this->getID();
 // }

    public function getIndex($slug){
        //fetch on the db based on slug
        $project = Project::where('slug','=', $slug)->first();
        $tasks = Task::all();
        
        //return a view
        return view('tasks.index')->withProject($project)->withTasks($tasks);
    }

    public function joinTask(Request $request, $taskId)
    {
         $task = Task::find($taskId);
         $userId = Auth::user()->id;
         $user = User::find($userId);
       //  $users = User::all();
       // // $user = Auth::user();
       //  // die($userId);
         // $task->users()->save($user);
         // $user->tasks()->save($task);

          Task::find($taskId)->users()->attach($userId);
            
            //$tasks = $this->request->input('tasks', []);
         
            //$user->tasks()->attach($tasks);

        Session::flash('success','task asignat cu success');

        return redirect()->route('tasks.index')->withProject($project)->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'         =>'required|max:255',
            'description'  =>'required|min:5|max:2000'
            
            ));

        $project = Project::find($project_id);

        $task = new Task;

        $task->name        = $request->name;
        $task->description  = $request->description;

        $task->project()->associate($project);

        $task->save();

        Session::flash('success','task success');

        return redirect()->route('tasks.single', [$project->slug]);
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
