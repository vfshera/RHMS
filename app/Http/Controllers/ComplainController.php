<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::orderBy('created_at' , 'DESC')->paginate(7);


        return view('pages.roadusers.allcomplains', compact('complains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.roadusers.complaints');
    }


    public function store(Request $request)
    {

       $data = $request->validate([
           'caption' => 'required|string',
          'location'=> 'required|string',
          'image' => 'required|file'
       ]);
            $complain = new Complain();
            $complain->caption = $data['caption'];
            $complain->location = $data['location'];
            $complain->user_id = auth()->user()->id;
            $complain->read = 0;


        $ComplainFile = $request->file('image');
        $ComplainFileName = time()."_"."COMP_".$ComplainFile->getClientOriginalName();


        if( $ComplainFile->storeAs('public/complains', $ComplainFileName) ){
            $complain->image = $ComplainFileName;

            $complain->save();
            toast('Complain Received!','success')->position('top')->autoClose(3500);

            return redirect()->back();

        }else{
            toast('Failed To Send Complain!','error')->position('top')->autoClose(3500);

            return redirect()->back();
        }
    }


    public function show(Complain $complain)
    {
        return view('pages.roadusers.complain' ,compact('complain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        //
    }
}
