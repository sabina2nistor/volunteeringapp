<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Association;
use Purifier;
use Session;
use Image;
use Storage;
use App\Department;
use Illuminate\Support\Facades\Auth;
use App\User;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associations = Association::all();
        return view('associations.index')->withAssociations($associations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $departments = Department::all();
        return view('associations.create');
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
                'name'         => 'required|max:25',
                'description'          => 'required',
                'location'    => 'required',
                'field'      => 'required',
                'logo_image'    => 'sometimes',
                

            ));

        $association = new Association;
        $department = new Department;
        $user = Auth::user();
        

        $association->name             = $request->name;
        $association->description       = Purifier::clean($request->description);
        $association->location              = $request->location;
        $association->field        = $request->field;

        

        if($request->hasFile('logo_image')){
             $logoimg = $request->file('logo_image');
             $filename = time() . '.' . $logoimg->getClientOriginalExtension();
             $location = public_path('images/' . $filename);
             Image::make($logoimg)->resize(200,200)->save($location);

        $association->logoimg = $filename;
         }

        $association->save();

        $department->name = 'departament admin';
        $department->description = 'Departament special pentru userul de tip ADMINISTRATOR';
        $department->association_id = $association->id;
        $department->save();

        $user->department_id = $department->id;

        $user->save();

        Session::flash('success','Asociatia a fost creata cu succes');

        return redirect()->route('associations.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $association = Association::find($id);

        return view('associations.show')->withAssociation($association);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $association = Association::find($id); 
        return view('associations.edit')->with('association',$association);
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
        $association = Association::find($id);

        
            $this->validate($request, array(
                'name'         => 'required|max:25',
                'description'          => 'required',
                'location'    => 'required',
                'field'      => 'required',
                'logo_image'  => 'image'
            ));
        
        $association->name=$request->input('name');
        $association->description = Purifier::clean($request->input('description'));
        $association->location=$request->input('location');
        $association->field=$request->input('field');

        if($request->hasFile('logo_image')){
            $logoimg = $request->file('logo_image');
            $filename = time() . '.' . $logoimg->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($logoimg)->resize(200,200)->save($location);

            $oldFilename=$association->logoimg;

            $association->logoimg = $filename;

            Storage::delete($oldFilename);
        }

        $association->save();

        
        Session::flash('success',' Asociatia s-a modificat cu succes!');
        return redirect()->route('associations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $association = Association::find($id);

        Storage::delete($association->logoimg);

        $association->delete();

        

        Session::flash('success','Asociatia a fost stearsa cu succes');
        return redirect()->route('associations.index');
    }
}
