<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            // $token = JWTAuth::fromUser($user);
            // $token = $user->createToken('token creation')->plainTextToken;
            $tokenResult = $user->createToken('token creation');
            $token = $tokenResult->plainTextToken;
    
            // Set the expiration time (e.g., 1 minute from now)
            // $tokenResult->accessToken->expires_at = now()->addMinutes(1);
            $tokenResult->accessToken->save();
            return response()->json(['message'=>'User Login Succssfully','token'=>$token,'user'=>$user],200);
        }
        return response()->json(['message'=>'Invalid Credentials'],401);
    }
}
