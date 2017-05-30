<?php

namespace App\Http\Controllers;

//use App\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Department;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;
use DB;
use App\Task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $search = \Request::get('search');
        //$projects = Project::where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(4);

        $projects = DB::table('projects')
            ->join('departments', 'departments.id', '=', 'projects.department_id')
            ->join('associations', 'associations.id', '=', 'departments.association_id')
            ->select('projects.*', 'departments.name')->where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(6);


        // $projects = Project::orderBy('id','desc')->paginate(5);
        //return a view and pass above the variable
        return view('projects/index')->withProjects($projects);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $tags = Tag::all();
        return view('projects.create')->withDepartments($departments)->withTags($tags);
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
                'title'         => 'required|max:25',
                'slug'          =>'required|alpha_dash|min:5|max:255|unique:projects,slug',
                'department_id' =>'required|integer',
                'body'          => 'required',
                'begin_date'    => 'required',
                'end_date'      => 'required',
                'featured_image'=>'sometimes|image'

            ));

        $project = new Project;
        $task = new Task;

        $project->title             = $request->title;
        $project->department_id     = $request->department_id;
        $project->body              = Purifier::clean($request->body);
        $project->slug              = $request->slug;
        $project->begin_date        = $request->begin_date;
        $project->end_date          = $request->end_date;

         if($request->hasFile('featured_image')){
             $image = $request->file('featured_image');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/' . $filename);
             Image::make($image)->resize(800,400)->save($location);

        $project->image = $filename;
         }

        $project->save();

        $project->tags()->sync($request->tags, false);

        $task->name = 'Alocarea Project Managerului';
        $task->description ='Acest task este dedicat doar celui ce a fost ales Project Manager';
        $task->project_id = $project->id;
        $task->isManager = 1;

        $task->save();

        Session::flash('success','Proiectul a fost creat cu succes');

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Project::find($id);

        return view('projects.show')->withProject($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $departments =Department::all();
        $deps=array();

        foreach ($departments as $department) {
           $deps[$department->id] = $department->name;
        }  

         $tags = Tag::all();
         $tags2=array();
         $tags = Tag::pluck('name', 'id');

        return view('projects.edit')->with('project',$project)->withDepartments($deps)->withTags($tags);
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
        $project = Project::find($id);

        
            $this->validate($request, array(
            'title'=>'required|max:255',
            'slug' => 'required|alpha_dash|max:255|unique:projects,slug,' . $id,
            'body'=>'required',
            'featured_image'=>'image',
            'begin_date' => 'required',
            'end_date' => 'required',
            ));
        

        

        $project->title=$request->input('title');
        $project->slug=$request->slug;
        $project->department_id=$request->input('department_id');
        $project->body = Purifier::clean($request->input('body'));
        $project->begin_date=$request->input('begin_date');
        $project->end_date=$request->input('end_date');
        
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldFilename=$project->image;

            $project->image = $filename;

            Storage::delete($oldFilename);
        }


        $project->save();

        if(isset($request->tags)){
            $project->tags()->sync($request->tags);
        }else{
            $project->tags()->sync(array());
        }

        Session::flash('success',' Proiectul s-a modificat cu succes!');
        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        $project->tags()->detach();

        Storage::delete($project->image);

        $project->delete();
        Session::flash('success','Proiectul a fost sters cu succes');
        return redirect()->route('projects.index');
    }
}
