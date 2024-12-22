<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OneUser;

class LoginController extends Controller
{
    public function auth(Request $request){
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

            $email = $request->email;
            $password = $request->password;

            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                 $user=OneUser::where('email',$email)->first();
                 Auth::login($user);
                 return redirect()->route('home');
            }
            else{
                return redirect()->back()->with('error','Invalid Email or Password');
                }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
