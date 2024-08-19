<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class TableController extends Controller
{
   public function addview()
    {
        if (Auth::id()) {
            if (Auth::user()->typeUser == '1') {
                return view('admin.add_table');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function upload(Request $request)
    {
        $table = new Table;

        // Handle image upload
        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('tableimage', $imagename);
        $table->image = $imagename;

        // Assign the form values to the table object
        $table->tableNumber = $request->number;
        $table->persons = $request->persons;
        $table->description = $request->description;
        $table->seatingArea = $request->seatingArea;  // Updated from classTable to seatingArea
        $table->price = $request->pricenumber;

        // Save the table object to the database
        $table->save();

        return redirect()->back()->with('message', 'Table was added successfully');
    }
}
