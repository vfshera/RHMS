<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Contractor;
use App\Engineer;
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
    public function toggle(Request $request)
    {
      $data =  $request->validate([
          'status' => 'required'
      ]);

      if($request->has('user_id')){
          $user = User::findOrFail($request->user_id);
          $message = ['Deactivated!','Activated!'];

          $user->status = $data['status'];
          if($user->save()){
              toast($user->name." 's ".' Account '.$message[$data['status']],'success')->position('top')->autoClose(3500);
          }else{
              toast('Account Status Toggle Failed!','error')->position('top')->autoClose(3500);
          }
      }else{
          toast('User ID Not Found!','error')->position('top')->autoClose(3500);
      }


      return redirect()->back();
    }

    public function profile()
    {
        $my = auth()->user();
        return view('auth.profile', compact('my'));
    }

    public function picture(Request $request)
    {
        $pic = $request->validate([
            'profile_pic' => 'required|image'
        ]);


        $profilePic = $request->file('profile_pic');
        $profilePictFileName = time()."_"."PROFILE_".$profilePic->getClientOriginalName();


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
    public function update(Request $request){
           $details = $request->validate([
               'location' =>  'required',
               'cv' => 'required|file',
               'qualification' =>  'required|file'
           ]);

           if(auth()->user()->engineer){
               $eng = Engineer::findOrFail(auth()->user()->engineer->id);

               $EngineerCVFile = $request->file('cv');
               $EngineerCVFileName = time()."_"."ENG_CV_".$EngineerCVFile->getClientOriginalName();

               $EngineerQualificationFile = $request->file('qualification');
               $EngineerQualificationFileName = time()."_"."ENG_QUAL_".$EngineerQualificationFile->getClientOriginalName();

               if( $EngineerCVFile->storeAs('public/engineers/cv', $EngineerCVFileName) && $EngineerQualificationFile->storeAs('public/engineers/qualifications', $EngineerQualificationFileName) ){

                   $eng->location = $details['location'];
                   $eng->cv = $EngineerCVFileName;
                   $eng->qualification = $EngineerQualificationFileName;

                    if($eng->save()){
                        toast('Details Updated!','success')->position('top')->autoClose(3500);
                    }else{
                        toast('Failed To Update  Details!','error')->position('top')->autoClose(3500);

                    }

                   return redirect()->back();
               }else{

                   toast('Failed To Save Documents!','error')->position('top')->autoClose(3500);

                   return redirect()->back();
               }

           }elseif(auth()->user()->contractor){
               $cont = Contractor::findOrFail(auth()->user()->contractor->id);

               $ContractorCVFile = $request->file('cv');
               $ContractorCVFileName = time()."_"."CONT_CV_".$ContractorCVFile->getClientOriginalName();

               $ContractorQualificationFile = $request->file('qualification');
               $ContractorQualificationFileName = time()."_"."CONT_QUAL_".$ContractorQualificationFile->getClientOriginalName();

               if( $ContractorCVFile->storeAs('public/contractors/cv', $ContractorCVFileName) && $ContractorQualificationFile->storeAs('public/contractors/qualifications', $ContractorQualificationFileName) ){

                   $cont->location = $details['location'];
                   $cont->cv = $ContractorCVFileName;
                   $cont->qualification = $ContractorQualificationFileName;

                   if($cont->save()){
                       toast('Details Updated!','success')->position('top')->autoClose(3500);

                   }else{
                       toast('Failed To Update  Details!','error')->position('top')->autoClose(3500);

                   }

                   return redirect()->back();
               }else{

                   toast('Failed To Save Documents!','error')->position('top')->autoClose(3500);

                   return redirect()->back();
               }
           }
    }

}
