<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->get();
        $isLiked = Like::where('post_id', $post->id)->where('user_id', Auth::id())->exists();
        
        return view('post.show', compact('post', 'comments', 'isLiked'));
    }

    public function like(Post $post)
    {
        $like = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();
        
        if ($like) {
            $like->delete();
            $isLiked = false;
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
                'is_like' => true,
            ]);
            $isLiked = true;
        }

        return response()->json([
            'isLiked' => $isLiked,
            'likeCount' => $post->likes()->count(),
        ]);
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('post.show', $post)->with('success', 'Comment added.');
    }
}

