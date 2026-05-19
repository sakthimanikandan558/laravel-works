<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return Inertia::render('Todos/Index', [
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        Todo::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Todo $todo)
    {
        abort_if($todo->user_id !== $request->user()->id, 403);

        $validated = $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $todo->update([
            'title' => $validated['title'],
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, Todo $todo)
    {
        abort_if($todo->user_id !== $request->user()->id, 403);

        $todo->delete();

        return redirect()->back();
    }

    public function toggle(Request $request, Todo $todo)
    {
        abort_if($todo->user_id !== $request->user()->id, 403);

        $todo->update([
            'is_completed' => ! $todo->is_completed,
        ]);

        return redirect()->back();
    }
}