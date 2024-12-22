<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('user')->paginate(7);
            return view('admin.partials.posts', compact('posts'))->render();
        }

        $posts = Post::with('user')->paginate(7);
        return view('admin.posts', compact('posts'));
    }

    public function approve(Post $post)
    {
        $post->update(['is_approved' => true, 'status' => 'approved']);
        return redirect()->route('admin.posts')->with('success', 'Post approved successfully.');
    }

    public function reject(Post $post)
    {
        $post->update(['is_approved' => false, 'status' => 'rejected']);
        return redirect()->route('admin.posts')->with('success', 'Post rejected successfully.');
    }
}

