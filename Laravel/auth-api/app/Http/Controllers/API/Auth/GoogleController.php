<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Get the Google authentication URL
    public function getGoogleAuthUrl()
    {
        $url = Socialite::driver('google')
            ->stateless()
            ->redirect()
            ->getTargetUrl();
            \Log::info($url);

        return response()->json(['url' => $url]);

    }

    // Handle the callback from Google
    public function handleGoogleCallback()
    {
        \Log::info('Start');

        try {
            \Log::info('Start1');

            $googleUser = Socialite::driver('google')->stateless()->user();
            \Log::info('Start2');


            // Check if the user already exists
            $user = User::where('email', $googleUser->getEmail())->first();
            \Log::info('Start3');


            if (!$user) {
                // Create a new user if it doesn't exist
                $user = User::create([
                    'first_name' => $googleUser->getName(),
                    // 'last_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Random password since it's not required for Google login
                    'google_id' => $googleUser->getId(),
                ]);
            }

            // Create a personal access token for the user
            $token = $user->createToken('GoogleAuthToken')->plainTextToken;

            return redirect('http://localhost:5173/login?token=' . $token);

        } catch (\Exception $e) {
            \Log::info($e);
            return response()->json(['error' => 'Unable to authenticate user.'], 500);
        }
    }
}
