<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to access this area.');
        }

        // Check if user is admin (using both typeUser and roles)
        $user = Auth::user();

        if ($user->typeUser == '1' || $user->isAdmin()) {
            return $next($request);
        }

        // Redirect non-admin users
        return redirect()->back()->with('error', 'Unauthorized access. Admin privileges required.');
    }
}
