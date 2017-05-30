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

// Route::get('/', function () {
//     return view('welcome');
// });

// pages 
Route::get('/', 		 ['as' => 'login','uses'=> 'Auth\LoginController@showLoginForm']);
Route::get('vapp', 		 ['as' => 'vapp.seeprojects','uses'=> 'PagesController@getIndex' ]);
Route::get('vapp/{slug}',['as' => 'vapp.single','uses'=>'PagesController@getSingle']);

Route::get('contact', 'PagesController@getContact' );
Route::post('contact', 'PagesController@postContact' );

Route::get('about', 'PagesController@getAbout' );
Route::get('statistics', ['as' => 'vpages.statistics','uses'=>'PagesController@getStatistics' ]);

//Tags
Route::resource('tags','TagController',['except'=>['create']]);

//projects
Route::resource('projects','ProjectController');

//Route::get('blog',['uses'=>'BlogController@getIndex','as' => 'blog.index']);


Route::get('/home', ['as' => 'pages.vhome','uses'=>'HomeController@index']);

// PROFILE
Route::get('/profile/edit',"ProfileController@edit");
Route::put('/profile/edit',"ProfileController@update");
//Route::get('/profile',"ProfileController@edit");

//departments
//Route::resource('departments','DepartmentController',['except'=>['create']]);
Route::get('departments/{id}/departments-create',['as' => 'departments.index','uses'=>'DepartmentController@index']);
Route::post('departments/{id}/departments-create',['as' => 'departments.store','uses'=>'DepartmentController@store']);

//comments
Route::post('comments/{project_id}',['uses' => 'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}',['uses' => 'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentsController@destroy','as'=>'comments.destroy']);

//associations
Route::resource('associations','AssociationController',['except'=>['show']]);

//tasks
Route::get('vapp/{slug}/tasks',['as' => 'tasks.index','uses'=>'TaskController@getIndex']);
Route::post('vapp/assignTask/{task}',['as' => 'tasks.assign','uses'=>'TaskController@joinTask']);
Route::get('vapp/{slug}/tasks-create',['as' => 'tasks.create','uses'=>'TaskController@create']);
Route::post('vapp/{slug}/tasks-create',['as' => 'tasks.store','uses'=>'TaskController@store']);

//approve volunteers - admin
    Route::get('admin/approve',  ['middleware' => 'auth', 'admin','uses'=>'AdminController@getIndex','as' => 'admin.indexappoved']);
    Route::post('admin/approve/{user}',  ['as' => 'admin.approve','uses'=>'AdminController@approveUsers']);    
    Route::post('admin1/approve/{user}',  ['as' => 'admin.disapprove','uses'=>'AdminController@disapproveUsers']); 
    Route::get('admin',  ['middleware' => 'auth', 'admin','uses'=>'AdminController@index','as' => 'admin.index1']);
    Route::get('admin/users',  ['middleware' => 'auth', 'admin','uses'=>'AdminController@indexUsers','as' => 'admin.indexusers']);
    
// Auth::routes();
// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
   // Route::post('logout', ['as' => 'logout.post', 'uses' => 'Auth\LoginController@logout']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@index']);
    Route::get('register/ajax{id}', ['as' => 'register.ajax', 'uses' => 'Auth\RegisterController@indexAjax']);

    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);



// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

