<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// pages 
//Route::get('/', 		 ['as' => 'pages.vhome','uses'=> 'PagesController@getIndex' ]);
Route::get('vapp', 		 ['as' => 'vapp.seeprojects','uses'=> 'PagesController@getIndex' ]);
Route::get('vapp/{slug}',['as' => 'vapp.single','uses'=>'PagesController@getSingle']);


//projects
Route::resource('projects','ProjectController');

//Route::get('blog',['uses'=>'BlogController@getIndex','as' => 'blog.index']);
Auth::routes();

Route::get('/home', ['as' => 'pages.vhome','uses'=>'HomeController@index']);


//departments
Route::resource('departments','DepartmentController',['except'=>['create']]);

//tasks
Route::get('vapp/{slug}/tasks',['as' => 'tasks.index','uses'=>'TaskController@getIndex']);
Route::post('vapp/assignTask/{taskId}',['as' => 'tasks.assign','uses'=>'TaskController@joinTask']);
// Auth::routes();
// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
   // Route::post('logout', ['as' => 'logout.post', 'uses' => 'Auth\LoginController@logout']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

