<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Table; // Changed from Table to Table
use App\Models\Reservation;
use App\Models\Contact;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) 
        {
            if (Auth::user()->typeUser == '1') 
            {
                return view('admin.add_table'); // If you have a view that handles adding tables, you might want to rename this accordingly
            } 
            else
            {
                $tables = Table::all(); // Changed from $table to $tables

                return view('user.home', compact('tables')); // Changed from 'table' to 'tables'
            }
        }
        else
        {
            $tables = Table::all(); // Changed from $table to $tables

            return view('user.home', compact('tables')); // Changed from 'table' to 'tables'
        }
    }

    public function index()
    {
        if (Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $tables = Table::all(); // Changed from $table to $tables
            return view('user.home', compact('tables')); // Changed from 'table' to 'tables'
        }
    }

    public function about()
    {
        return view('user.about');
    }
}
