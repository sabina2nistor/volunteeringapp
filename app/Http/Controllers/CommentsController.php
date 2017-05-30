<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Project;
use Session;
use Illuminate\Support\Facades\Auth;
use App\User;


class CommentsController extends Controller
{
   //  public function __construct(){

   //      $this->middleware('auth', ['except' => 'store']);
   // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $project_id)
    {
        $this->validate($request, array(
            // 'name'         =>'required|max:255',
            // 'email'          =>'required|email|max:255',
            'comment'   =>'required|min:5|max:2000',
            
            ));

        $project = Project::find($project_id);
        $user = Auth::user();

        $comment = new Comment;

        $comment->name        = $user->name;
        $comment->email         = $user->email;
        $comment->comment  = $request->comment;
        $comment->approved         = true;
        $comment->project()->associate($project);

        $comment->save();

        Session::flash('success','comment success');

        return redirect()->route('vapp.single', [$project->slug]);
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
        $comment =Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment =Comment::Find($id);

        $this->validate($request, array('comment'=> 'required'));

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', ' success');
        return redirect()->route('projects.show', $comment->project->id);
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
