<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\Contact;

class ReservationController extends Controller
{
   
/* User panel */
 public function myreservation()
    {


        if(Auth::id())
        {
            $userid= Auth::user()->id;

            $book = reservation::where('user_id', $userid)->get();
            return view('user.my_reservation', compact('book'));
        }
        else
        {
            return redirect()->back();
        }
    }


    public function cancel_book($id)
    {
    $data=reservation::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'The booking has been canceled !');
    }



    /*Admin panel */

    public function booking()
    {
        $data=reservation::all();

        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.booking', compact('data'));
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


    public function approved_booking($id)
    {
        $data=reservation::find($id);
        
        $data->status='Approved';

        $data->save();

    return redirect()->back()->with('message', "The booking on table nr $data->tableNumber by $data->name has been approved");

    }


    public function denied_booking($id)
    {
        $data=reservation::find($id);
        
        $data->status='Denied';

        $data->save();

    return redirect()->back()->with('message', "The booking on table nr $data->tableNumber by $data->name has been Denied");

    }



}
