<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = Comment::findOrFail($request->comment_id);

        // Check if the user is authorized to update the comment
        if (Auth::user()->id !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully');
    }
    public function destroy($id)
{
    $comment = Comment::find($id);
    if (auth()->user()->id == $comment->user_id) {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
}

}


