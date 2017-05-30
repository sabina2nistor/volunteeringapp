<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Association;
use App\Department;
use Response;
use Hash;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function index()
    {
            
        $associations = Association::pluck('name', 'id');
       
        return view('auth.register')->withAssociations($associations);
    }


    public function indexAjax($id)
    {

        $departments = Department::where("association_id",$id)->get();
        return json_encode($departments);

    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if( $request->has('admin')) {

            // $user = new User();

            // $user->admin = 1;
            // $user->name              = $request->name;
            // $user->email        = $request->email;
            // $user->password          = Hash::make($request->password);
            // $user->department_id          = 2;
            // $user->approved = 1;

            // $user->save();

            event(new Registered($user= $this->createAdmin($request->all())));

        }
        else{
            event(new Registered($user = $this->create($request->all())));
        }
        
        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'department_id' => 'sometimes',

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'department_id' => $data['department_id'],
        ]);
    }

    protected function createAdmin(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'department_id' => 2,
            'admin' => 1,
            'approved' => 1,
        ]);
    }
}
