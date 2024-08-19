<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;



class BookController extends Controller
{

    public function showDetail($id)
    {

        $table=table::find($id);
        return view('user.detail',compact('table'));
    }

    public function reservation(Request $request)
    {
        $data= new reservation;

        $data->tableNumber=$request->table_number;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->checkin=$request->start_date;
        $data->checkout=$request->end_date;
        $data->status="In progress";

        if(Auth::id())
        {
        $data->user_id=Auth::user()->id;
        }

    $data->save();

return redirect()->back()->with('message', 'Booking Submited !');

    }

}
