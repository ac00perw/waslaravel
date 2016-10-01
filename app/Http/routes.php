<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();     
    Route::get('avatar', 'ImageController@resizeImage');
    Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'PagesController@about');
    Route::get('user/{user}', 'UsersController@show');
    Route::get('user/{user}/lastwaste/{total?}', 'UsersController@getLastEntries');
    Route::resource('user', 'UsersController');

    //record waste as opposed to creating it
    Route::get('waste/record', 'WastesController@create');
    Route::resource('waste', 'WastesController', ['except' => ['create']]);

    Route::get('challenges/search/', 'ChallengesController@getUserList');
    Route::get('challenges/addToChallenge/{id}', 'ChallengesController@addTeamToChallenge');
    Route::get('challenges/prepareChallenge/{user_id}', 'ChallengesController@prepareChallenge');
    Route::get('challenges/send', 'ChallengesController@sendChallenge');
    Route::resource('challenges', 'ChallengesController');


    
    
});


