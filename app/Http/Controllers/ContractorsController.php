<?php

namespace App\Http\Controllers;

use App\Contractor;
use App\Http\Middleware\Authenticate;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class ContractorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors = User::where('access' , 2)->orderBy('created_at' ,'DESC')->get();

        return view('pages.contractors.index' , compact('contractors'));
    }



    public function available()
    {
        $projects = Project::where('progress' , 0)->where('contractor_id', null)->get();
        $location = auth()->user()->contractor->location ?? '';

        return view('pages.projects.find' , compact('projects' ,'location'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Contractor $contractor)
    {
        //
    }


    public function edit(Contractor $contractor)
    {
        //
    }

    public function update(Request $request, Contractor $contractor)
    {
        //
    }


    public function destroy(Contractor $contractor)
    {
        //
    }
}
