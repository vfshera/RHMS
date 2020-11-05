<?php

namespace App\Http\Controllers;

use App\Application;
use App\Engineer;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class EngineersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $engineers = User::where('access' ,1)->orderBy('created_at' ,'DESC')->get();


       return view('pages.engineers.index', compact('engineers'));
    }



    public function available()
    {
        $projects = Project::where('progress' , 0)->where('engineer_id', null)->get();

        $location = auth()->user()->engineer->location ?? '';
        return view('pages.projects.find' , compact('projects','location'));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Engineer $engineer)
    {
        //
    }


    public function edit(Engineer $engineer)
    {
        //
    }


    public function update(Request $request, Engineer $engineer)
    {
        //
    }


    public function destroy(Engineer $engineer)
    {
        //
    }
}
