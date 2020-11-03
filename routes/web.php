<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();



Route::group(['middleware' => ['auth']], function (){

    Route::get('/profile', 'HomeController@profile');

    Route::get('/applied-projects', 'ApplicationsController@applied');
    Route::get('/completed-projects', 'ProjectsController@completed');

    //admin routes
    Route::group(['middleware' => ['access:0']], function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/create-project', 'ProjectsController@create');
        Route::get('/assign-project', 'ProjectsController@show');
        Route::get('/projects', 'ProjectsController@index');
        Route::post('/projects', 'ProjectsController@store');
        Route::post('/set-project', 'ProjectsController@update');
        Route::get('/{title}-{id}-{location}', 'ProjectsController@edit');

        Route::get('/engineers', 'EngineersController@index');
        Route::get('/contractors', 'ContractorsController@index');
    });


    //engineers routes
    Route::group(['middleware' => ['access:1']],function(){
        Route::get('/engineer-projects', 'EngineersController@available');
    });


    //contractors routes
    Route::group(['middleware' => ['access:2']], function(){
        Route::get('/contactor-projects', 'ContractorsController@available');
    });


    //roadusers routes
    Route::group(['middleware' => ['access:3']], function(){

    });

});
