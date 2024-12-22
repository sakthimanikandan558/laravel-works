<?php

namespace App\Http\Controllers;

use App\Models\Emptab;

use Illuminate\Http\Request;

class EmptabController extends Controller
{
    
    public function insertHardcodedValues()
    {
        // Hardcoded values
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'salary' => 50000
        ];

        // Insert the data into the emptab table
        Emptab::create($data);
        $data1=Emptab::all();

        // return response()->json(['message' => 'Employee created successfully.', 'data' => $data], 201);
        // return  $data;
        // return view('success', ['data' => $data]);
        // return view('success', compact('data'));
        return view('success')->with('data', $data1);
    }
}
