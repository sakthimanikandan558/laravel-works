<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
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
        $user = auth()->user();
        $roleId=$user->role_id;
        $roleName=Role::find($roleId)->name;
        if ($user && $roleName === 'Admin') {
            return $next($request);
        }

        return redirect()->back()->with('error', 'You do not have access to this page.');
    }
}
