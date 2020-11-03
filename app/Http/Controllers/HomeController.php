<?php

namespace App\Http\Controllers;

use App\Complain;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $my = auth()->user();
        return view('auth.profile', compact('my'));
    }
    public function picture(Request $request)
    {
        $pic = $request->validate([
            'profile_pic' => 'required|file|'
        ]);


        $profilePic = $request->file('profile_pic');
        $profilePictFileName = time()."_"."PROJ_".$profilePic->getClientOriginalName();


        if( $profilePic->storeAs('public/profiles', $profilePictFileName) ){
            $me = User::findOrFail(auth()->user()->id);
            $me->image = $profilePictFileName;

            $me->save();
            toast('Profile Changed!','success')->position('top')->autoClose(3500);

        }else{
            toast('Failed To Change Profile!','error')->position('top')->autoClose(3500);
        }
        return redirect()->back();
    }


}
