<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Authenticate the user
    public function auth(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            Auth::login($user);

            // Check user's role and redirect accordingly
            switch ($user->role_id) {
                case 2: // Content Writer
                    return redirect()->route('content.writer.dashboard')->with('success', 'Welcome, Content Writer ' . $user->name);
                case 3: // Admin
                    return redirect()->route('admin.posts')->with('success', 'Welcome, Admin!'. $user->name);
                case 1: // User
                    return redirect()->route('user.posts')->with('success', 'Welcome!'. $user->name);
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Access denied.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
