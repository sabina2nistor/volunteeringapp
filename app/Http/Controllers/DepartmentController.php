<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Department;
use App\Association;
use Session;

class DepartmentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $association = Association::where('id','=', $id)->first();
        $departments = Department::all();
        return view('departments.index', compact('projects'))->withDepartments($departments)->withAssociation($association);
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
    public function store(Request $request, $id)
    {
        $this->validate($request, array(
            'name'=>'required|max:255',
            'description'=>'sometimes',
            ));

        $association = Association::where('id','=', $id)->first()->id;

        //store the database
        $department = new Department;

        $department->name = $request->name;
        $department->description =$request->description;
        $department->association_id  = $association;

        $department->save();

        Session::flash('success','Departamentul a fost adaugat cu succes');

        return redirect()->route('departments.index');
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
        //
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
        //
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
