<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;


class ContactController extends Controller
{

/*User panel */

 public function contact()
    {
                    return view('user.contact');
    }


    public function add_contactform(Request $request)
    {
        $contact = new contact;

        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->message=$request->message;

        $contact->save();

        return redirect()->back()->with('message', 'You\'re message has been send !');



    }





/*Admin panel */
     public function contact_forms()
{

    $data=contact::all();


        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.contact', compact('data'));
                    } else
                    {
                    return redirect()->back();
                    }
                }
                else
                {
                return redirect('login');
                }

}



 public function delte_froms($id)
    {
        $data=contact::find($id);

            $data->delete();


        return redirect()->back()->with('message', "The message from $data->email has been deleted");
    }

}
