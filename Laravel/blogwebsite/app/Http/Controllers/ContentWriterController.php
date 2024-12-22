<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ContentWriterController extends Controller
{
    // Display the dashboard with all posts
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('content-writer.dashboard', compact('posts'));
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('content.writer.dashboard')->with('success', 'Post created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::findOrFail($request->post_id);

        if (Auth::user()->id !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_approved' => false,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Post updated successfully!');
    }
}

