<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;



class AdminController extends Controller
{

    public function users_rights()
    {
            $data=user::all();


            if(Auth::id())
                    {
                        if(Auth::user()->typeUser=='1')
                        {
                            return view('admin.user_managment', compact('data'));
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

    public function promote_user(Request $request,$id)
    {

            $user=user::find($id);

            $user->typeUser = 1;

            $user->save();

            return redirect()->back()->with('message', "The user $user->email has been promoted to admin !");
    }


    public function discard_user(Request $request,$id)
    {

            $user=user::find($id);

            $user->typeUser = 0;

            $user->save();

            return redirect()->back()->with('message', "The user $user->email has been discarded to user !");
    }






}
