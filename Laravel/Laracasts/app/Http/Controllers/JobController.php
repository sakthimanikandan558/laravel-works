<?php

namespace App\Http\Controllers;
use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs', compact('jobs'));
    }

    public function create()
    {
        return view('create-job');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }
}
