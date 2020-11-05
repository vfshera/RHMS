<?php

namespace App\Http\Controllers;

use App\Project;
use App\Showcase;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
      return view('pages.showcases.create');
    }


    public function store(Request $request)
    {
        $show = $request->validate([
            'caption' => 'required',
            'location' => 'required',
            'project_id' => 'required',
            'before_img' => 'required|image',
            'after_img' => 'required|image',
        ]);

        $proj = Project::findOrFail($show['project_id']);

        if($proj->progress == '1'){

            $ShowCaseBeforeFile = $request->file('before_img');
            $ShowCaseBeforeFileName = time()."_"."BEFORE_".$ShowCaseBeforeFile->getClientOriginalName();

            $ShowCaseAfterFile = $request->file('after_img');
            $ShowCaseAfterFileName = time()."_"."AFTER_".$ShowCaseAfterFile->getClientOriginalName();

            if( $ShowCaseBeforeFile->storeAs('public/showcases', $ShowCaseBeforeFileName ) && $ShowCaseAfterFile->storeAs('public/showcases', $ShowCaseAfterFileName) ){
                $showCase = new Showcase();

                $showCase->before_img = $ShowCaseBeforeFileName;
                $showCase->after_img = $ShowCaseAfterFileName;
                $showCase->location = $show['location'];
                $showCase->caption = $show['caption'];
                $showCase->project_id = $show['project_id'];

                $showCase->save();

                toast('Showcase Posted!','success')->position('top')->autoClose(3500);

                return redirect()->back();

            }else{
                toast('Failed To Post Showcase!','error')->position('top')->autoClose(3500);

                return redirect()->back();
            }
        }else{
            toast('Action Unavailable!','error')->position('top')->autoClose(3500);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase $showcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase $showcase)
    {
        //
    }
}
