<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::orderBy('created_at', 'DESC')->paginate(7);

        $types = ['','engineer_id','contractor_id'];


        return view('pages.applications.index', compact('applications' ,'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'project_id'=>'required|string',
            'location'=>'required|string'
        ]);

        $applied = Application::where('project_id', $data['project_id'])->where('user_id', auth()->user()->id)->get()->count();

        if($applied > 0){
            toast('You Alredy Applied To This Project!','error')->position('top')->autoClose(4500);

            return redirect()->back();
        }

        $userLocation =  (auth()->user()->access == 1) ? strtolower(auth()->user()->engineer->location) : strtolower(auth()->user()->contractor->location);
        if($userLocation == $data['location'] ){
            if(
            Application::create([
                'project_id' => $data['project_id'],
                'type' => (auth()->user()->access == 1) ? 'ENGINEER' : 'CONSTRUCTOR',
                'user_id' => auth()->user()->id,
                'user_access' => auth()->user()->access,
            ])
            ){
                toast('Project Application Sent!','success')->position('top')->autoClose(4500);
            }else{
                toast('Project Application Failed!','error')->position('top')->autoClose(4500);
            }

        }else{
            toast('Sorry You Cant Apply To This Project!','error')->position('top')->autoClose(4500);
        }

        return redirect()->back();
    }

    public function applied(Request $request)
    {
        $applications = Application::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('pages.projects.applied', compact('applications'));
    }

    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
