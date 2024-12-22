<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OneUser;
use Illuminate\Support\Facades\Auth;  

class RegisterController extends Controller
{
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]
        );

        $user = new OneUser;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = $request->admin ?? false; // Save is_admin field using null coalescing operator
        $user->save(); 

        Auth::login($user);
        return redirect()->route('home');
    }
}
