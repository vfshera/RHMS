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
    $showcases = \App\Showcase::orderBy('created_at', 'DESC')->take(5)->get();


    return view('welcome', compact('showcases'));
});

Route::get('/projects-view', function () {
    $projects = \App\Project::where('progress' , 1)->paginate(9);
    return view('pages.front-pages.projects', compact('projects'));
});

Route::get('/projects-pending', function () {
    $projects = \App\Project::where('progress' , 0)->paginate(9);
    return view('pages.front-pages.projects', compact('projects'));
});


Route::post('/register-users', [\App\Http\Controllers\Auth\RegisterController::class , 'registerUsers']);
Route::post('/send-message', [\App\Http\Controllers\ContactController::class , 'store']);


Auth::routes();



Route::group(['middleware' => ['auth','activated']], function (){

    Route::get('/profile', 'HomeController@profile')->withoutMiddleware('activated');
    Route::post('/profile-update', 'HomeController@update');
    Route::post('/change-profile', 'HomeController@picture');

    Route::post('/apply-project', 'ApplicationsController@apply');
    Route::get('/applied-projects', 'ApplicationsController@applied');
    Route::get('/completed-projects', 'ProjectsController@completed');

    Route::get('/home', 'HomeController@index')->name('home')->middleware('access:7');

    //admin routes
    Route::group(['middleware' => ['access:0']], function(){
        Route::get('/create-project', 'ProjectsController@create');
        Route::post('/assign', 'ProjectsController@assign');
        Route::get('/projects', 'ProjectsController@index');
        Route::get('/view-complains', 'ComplainController@index');
        Route::get('/complain/{complain}/{caption}', 'ComplainController@show');
        Route::post('/projects', 'ProjectsController@store');
        Route::post('/set-project', 'ProjectsController@update');
        Route::get('/edit-{title}-{id}-{location}', 'ProjectsController@edit');

        Route::post('/showcase', 'ShowcaseController@store');
        Route::get('/showcases', 'ShowcaseController@index');
        Route::delete('/remove-showcase/{showcase}', 'ShowcaseController@destroy');

        Route::get('/applications', 'ApplicationsController@index');
        Route::post('/toggle-status', 'HomeController@toggle');


        Route::get('/engineers', 'EngineersController@index');
        Route::get('/contractors', 'ContractorsController@index');

        Route::get('/messages', [\App\Http\Controllers\ContactController::class , 'index']);

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
        Route::get('/complains', 'ComplainController@create');
        Route::post('/complains', 'ComplainController@store');
        Route::get('/allprojects', 'ProjectsController@ratable');
        Route::get('/{title}-{id}-{location}', 'ProjectsController@view');

        Route::post('/rate', 'ProjectsController@rate');

    });

});
