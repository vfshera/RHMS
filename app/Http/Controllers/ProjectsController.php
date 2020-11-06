<?php

namespace App\Http\Controllers;

use App\Application;
use App\Contractor;
use App\Engineer;
use App\Project;
use App\Rating;
use App\Showcase;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('pages.projects.all' , compact('projects'));
    }

    public function ratable()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('pages.projects.all-ratable' , compact('projects'));
    }


    public function create()
    {
        return view('pages.projects.create');
    }


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
        $applications = Application::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();

        return view('pages.projects.completed', compact('applications'));
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

        $show = Showcase::where('project_id', $project->id)->first()->count();



        return view('pages.projects.edit' , compact('project','contractors','engineers','show'));
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



    public function view($title,$id ,$locations)
    {
        $project = Project::findOrFail($id);
        $engineers = User::where('access' , 1)->orderBy('name' , 'DESC')->get();
        $contractors = User::where('access' , 2)->orderBy('name' , 'DESC')->get();

        $rated = $project->ratings->count();
        $canRate = $project->ratings->where('user_id',auth()->user()->id)->count();
        $totalRating = 0;
            foreach ($project->ratings as $pRating){
                $totalRating += $pRating->rating;
            }

            $avgRating = ($totalRating == 0 || $rated == 0) ? 0 : ($totalRating / $rated);
        return view('pages.projects.view' , compact('project','contractors','engineers', 'canRate', 'avgRating'));
    }

    public function rate(Request $request)
    {
        $projectRating = $request->validate([
            'project_id' => 'required',
            'rating' => 'required',
        ]);


        $projectRating += ['user_id' => auth()->user()->id];

       if(Rating::create($projectRating)){
           toast('Rating Submitted!','success')->position('top')->autoClose(4500);
       }else{
           toast('Failed To Rate This Project!','error')->position('top')->autoClose(4500);
       }

       return redirect()->back();
    }



    public function destroy(Project $project)
    {
        //
    }
}
