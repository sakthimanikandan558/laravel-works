<?php

namespace App\Http\Controllers;

use App\Models\Emptab1;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Emptab1Controller extends Controller
{
    public function create()
    {
        return view('create_employee');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => '',
            'dept' => '',
            'position' => '',
            'salary' => '',
        ]);

        try {
            // Perform the database operation
            Emptab1::create1([
                'name' => $validatedData['name'],
                'dept' => $validatedData['dept'],
                'position' => $validatedData['position'],
                'salary' => $validatedData['salary'],
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Employee created successfully');

        } catch (QueryException $e) {
            // Handle database query exceptions
            return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()])->withInput();

        } catch (\Exception $e) {
            // Handle general exceptions
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }
}

