<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Association;
use App\Department;
use Illuminate\Support\Facades\DB;
use Session;


class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

    public function getIndex()
    {
        
        $users = User::where('approved',0)->get();

        // $usersArray = User::where('approved',0)->get()->toArray();
        $usersArray = DB::table('users')->select(DB::raw('id'))->where('approved', 0)->get()->toArray();
        
        // $usersArray = DB::table('users')->select('users.id','users.name','users.email','departments.name')->join('departments','departments.id','=','users.department_id')->where('approved', 0)->get()->toArray();
        //dd($usersArray);
        $userDist = [];
        for ($i=0; $i < count($usersArray); $i++) { 
            $userDist[$i] = $usersArray[$i]->id;
        }
              
        return view('admin.indexapproved', ['userDist' => $userDist])->withUsers($users);
    	
    }

    public function approveUsers(Request $request, $id)
    {
        $user = User::Find($id);

        $user->approved = 1 ;

        $user->save();

        Session::flash('success','User aprobat in aplicatie cu success');

        return redirect()->back();
    }

    public function disapproveUsers(Request $request, $id)
    {
        $user = User::Find($id);

        $user->approved = -1 ;

        $user->save();

        Session::flash('success','Userul nu a fost aprobat');

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.index');

    }

    public function indexUsers()
    {
        $users = User::all();

        return view('admin.indexusers')->withUsers($users);

    }

}
