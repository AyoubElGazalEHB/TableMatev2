<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CreateUserController extends Controller
{
    public function create()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('login')->with('message', 'Unauthorized access');
        }

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('login')->with('message', 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => 'array',
            'roles.*' => 'exists:roles,id'
        ]);

        $adminRoleId = Role::where('name', 'Admin')->first()?->id;
        $isAdmin = in_array($adminRoleId, $request->roles ?? []);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'typeUser' => $isAdmin ? '1' : '0'
        ]);

        if ($request->has('roles')) {
            $user->roles()->attach($request->roles);
        }

        return redirect('/users_rights')->with('message', "User {$user->name} created successfully!");
    }
}
