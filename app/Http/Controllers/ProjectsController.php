<?php

namespace App\Http\Controllers;

use App\Contractor;
use App\Engineer;
use App\Project;
use App\User;
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



    public function completed(Request $request)
    {
        return view('pages.projects.completed');
    }

    public function show(Project $project)
    {
        return view('pages.projects.assign');
    }

    public function edit($title,$id ,$locations)
    {

        $project = Project::findOrFail($id);
        $engineers = User::where('access' , 1)->orderBy('name' , 'DESC')->get();
        $contractors = User::where('access' , 2)->orderBy('name' , 'DESC')->get();

        return view('pages.projects.edit' , compact('project','contractors','engineers'));
    }


    public function update(Request $request)
    {

        $data = $request->validate([
            'engineer_id'=> 'required|string',
            'contractor_id' => 'required|string',
            'progress'=> 'required|string',
            'title' => 'required|string',
            'location' => 'required|string',
            'starting_date' => 'required|string',
            'project_span'=> 'required|string',
            'date_finished' => 'required|string',
        ]);

        $proj = Project::findOrFail($request->project_id);


        if( $proj->update($data)){
            toast('Project Updated!','success')->position('top')->autoClose(4500);
        }else{
            toast('Failed To Update Project!','error')->position('top')->autoClose(4500);
        }

        return redirect()->back();
    }



    public function destroy(Project $project)
    {
        //
    }
}
