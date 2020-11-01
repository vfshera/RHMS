<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('pages.projects.all' , compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|string',
            'project_span' => 'required|string',
            'image' => 'required|image|mimes:png,jpeg|max:10240',
        ]);



        $newProject = new Project();
        $newProject->title = $project['title'];
        $newProject->location = $project['location'];
        $newProject->starting_date = $project['start_date'];
        $newProject->project_span = $project['project_span'];

        $ProjectFile = $request->file('image');
        $ProjectFileName = time()."_"."PROJ_".$ProjectFile->getClientOriginalName();


        if( $ProjectFile->storeAs('public/projects/images', $ProjectFileName) ){
            $newProject->image = $ProjectFileName;

            $newProject->save();
            toast('Project Uploaded!','success')->position('top')->autoClose(3500);

            return redirect()->back();

        }else{
            toast('Failed To Upload Project!','error')->position('top')->autoClose(3500);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */


    public function completed(Request $request)
    {
        return view('pages.projects.completed');
    }

    public function show(Project $project)
    {
        return view('pages.projects.assign');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($title,$id ,$locations)
    {

        return view('pages.projects.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
