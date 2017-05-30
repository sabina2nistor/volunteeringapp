<?php

namespace App\Http\Controllers;

use App\Events\UserUpdatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index(){
    //     return view('vpages.profile-view');
    // }

    public function edit($id)
    {
        $user1 = Auth::user();
        $user = User::Find($user1->id);
        dd($user);
        return view('vpages.profile-edit');
    }
    //TODO: create ProfileEditFormRequest
    public function update(Request $request)
    {
        // if (empty($request->input('password'))) {
        //     $this->validate($request, [
        //         'name' => 'required|min:5'
        //     ]);
        //     $request->user()->update([
        //         'name' => $request->get('name')
        //     ]);
        // } else {
        //     $this->validate($request, [
        //         'name' => 'required|min:5',
        //         'password' => 'required|min:6'
        //     ]);
        //     $request->user()->update([
        //         'name' => $request->get('name'),
        //         'password' => bcrypt($request->get('password'))
        //     ]);
        // }

        // event(new UserUpdatedData($request->user()));

        // if($request->ajax()){
        //     return response()->json(auth()->user(),200);
        // }
        // else{
        //     return response(auth()->user(), 200);
        // }
        $user1 = Auth::user();
        $user = User::Find($user1->id);

        $this->validate($request, array('name'=> 'required|min:3','password' => 'required|min:6'));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Session::flash('success', ' success');
        return redirect()->route('vpages.profile-edit');
    }
}
