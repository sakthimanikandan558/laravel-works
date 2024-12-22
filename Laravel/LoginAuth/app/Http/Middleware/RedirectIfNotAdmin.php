<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user = Auth::user();

        // if($user){
        //     if ($user->is_admin) {
        //         return redirect()->route('adminhome');
        //     } else {
        //         return redirect()->route('home');
        //     }
        // }
        $user = Auth::user();
        // Check if the user is authenticated and their is_admin status


            if ($user->is_admin) {
                // If user is an admin and trying to access home, redirect to admin home
                if ($request->is('app/home')) {
                    return redirect('app/adminhome');
                }
            } else {
                // If user is not an admin and trying to access admin home, redirect to regular home
                if ($request->is('app/adminhome')) {
                    return redirect('app/home');
                }
            }
 
         return $next($request);
    }
}
