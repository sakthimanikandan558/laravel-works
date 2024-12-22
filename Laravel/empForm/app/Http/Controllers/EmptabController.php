<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emptab;

class EmptabController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function index()
    {
        // Retrieve all employee records
        $employees = Emptab::all();

        // Return a view with all employee data
        return view('index', compact('employees'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'salary' => 'required|integer',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        // Insert the data into the emptab table
        // $employee = Emptab::create($request->all());
        $employee = Emptab::create($request->except('_token'));

        // Redirect to a view to display the employee details
        return redirect()->route('show', $employee->id);
    }

    public function show($id)
    {
        $employee = Emptab::findOrFail($id);

        // Return a view with the employee data
        return view('show', compact('employee'));
    }
}
