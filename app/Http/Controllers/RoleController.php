<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('login')->with('message', 'Unauthorized access');
        }

        $roles = Role::with('users')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function assignRole(Request $request, $userId)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('login')->with('message', 'Unauthorized access');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($userId);
        $role = Role::findOrFail($request->role_id);

        if (!$user->roles->contains($role->id)) {
            $user->roles()->attach($role->id);
            return redirect()->back()->with('message', "Role {$role->name} assigned to {$user->name}!");
        }

        return redirect()->back()->with('error', 'User already has this role');
    }

    public function removeRole(Request $request, $userId, $roleId)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('login')->with('message', 'Unauthorized access');
        }

        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);

        $user->roles()->detach($roleId);
        return redirect()->back()->with('message', "Role {$role->name} removed from {$user->name}!");
    }
}
