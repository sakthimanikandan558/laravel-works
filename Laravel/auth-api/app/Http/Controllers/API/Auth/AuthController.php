<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getUser(Request $request)
    {
        // Use the authenticated user (from the sanctum token)
        return response()->json([
            'user' => $request->user(),
        ]);
    }

}
