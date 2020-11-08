<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::orderBy('created_at','DESC')->paginate(7);

        return view('pages.direct-messages.dms' , compact('messages'));
    }

    public function store(Request $request)
    {
       $msg = $request->validate([
           'name' => 'required|string',
          'email' => 'required|string',
          'phone' => 'required|string',
          'message' => 'required|string',
       ]);

       if(Contact::create($msg)){
           toast('Message Sent!','success')->position('top')->autoClose(3500);
       }else{
           toast('Failed To Send Message!','error')->position('top')->autoClose(3500);
       }

       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
