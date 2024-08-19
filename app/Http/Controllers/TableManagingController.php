<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class TableManagingController extends Controller
{
    public function tables()
    {
        $data = Table::all();

        if (Auth::id()) {
            if (Auth::user()->typeUser == '1') {
                return view('admin.tables', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function delete_table($id)
    {
        $data = Table::find($id);
        $data->delete();

        return redirect()->back()->with('message', "The table number $data->tableNumber has been deleted");
    }

    public function edittable($id)
    {
        $data = Table::find($id);

        if (Auth::id()) {
            if (Auth::user()->typeUser == '1') {
                return view('admin.edit_table', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function changing_table(Request $request, $id)
    {
        $table = Table::find($id);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('tableimage', $imagename);
            $table->image = $imagename;
        }

        $table->tableNumber = $request->number;
        $table->persons = $request->persons;
        $table->description = $request->description;
        $table->seatingArea = $request->seatingArea;

        $table->save();

        return redirect()->back()->with('message', "The table number $table->tableNumber has been updated");
    }
}

