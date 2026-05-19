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
}