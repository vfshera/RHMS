<?php

namespace App\Http\Controllers\Auth;

use App\Contractor;
use App\Engineer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerUsers(Request $request)
    {
        $data = $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'access' => ['required', 'string'],
        ]);



        $UserProfileFile = $request->file('image');
        $UserProfileFileName = time()."_"."PROFILE_".$UserProfileFile->getClientOriginalName();

        if( $UserProfileFile->storeAs('public/profiles', $UserProfileFileName) ){


            if($data['access'] != '0'){
                $createdUser = new User();

                $createdUser->image = $UserProfileFileName;
                $createdUser->name = $data['name'];
                $createdUser->password = Hash::make($data['password']);
                $createdUser->email = $data['email'];
                $createdUser->access = $data['access'];

                if($data['access'] == '3'){
                    $createdUser->status = '1';
                }else{
                    $createdUser->status = '0';
                }

                if($createdUser->save()){
                    if($createdUser->access == '1'){
                        $eng = new Engineer();
                        $eng->user_id = $createdUser->id;

                        $eng->save();

                        toast('ENGINEER CREATED!','error')->position('top')->autoClose(3500);

                        return view('auth.login');

                    }else if($createdUser->access == '2'){
                        $cont = new Contractor();
                        $cont->user_id = $createdUser->id;

                        $cont->save();

                        toast('CONTRACTOR CREATED!','success')->position('top')->autoClose(3500);

                        return view('auth.login');
                    }

                }else{
                    toast('USER ID NOT CREATED!','error')->position('top')->autoClose(3500);
                    return redirect()->back();
                }
            }

        }else{

            toast('Failed To Create Account!','error')->position('top')->autoClose(3500);

            return redirect()->back();
        }


    }
}
