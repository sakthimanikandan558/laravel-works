<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_approved', true)
                     ->with('user') // Eager load the user relationship
                     ->get();

        return view('user.posts', compact('posts'));
    }
}
