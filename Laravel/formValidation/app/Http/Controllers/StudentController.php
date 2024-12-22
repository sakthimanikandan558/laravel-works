<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function form()
    {
        return view('form');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)?(\.[A-Za-z]+)?$/',
            'age' => 'required|integer|gt:18',
            'email' => 'required|regex:/^[^\d][\w.-]*@[a-zA-Z]+\.[a-zA-Z]{2,}$/',
            'domain' => 'required',
            'mobileno' => 'required|regex:/^[9876]\d{9}$/',
            'file' => 'required|mimes:pdf',
        ], [
            'name.required' => 'The name field is required.',
            'name.regex' => 'The name can only contain letters, one space, and one dot.',
            'age.required' => 'The age field is required.',
            'age.integer' => 'The age must be an integer.',
            'age.gt' => 'The age must be greater than 18.',
            'email.required' => 'The email field is required.',
            'email.regex' => 'The email is invalid.',
            'domain.required' => 'The domain field is required.',
            'mobileno.required' => 'The mobile number field is required.',
            'mobileno.regex' => 'The mobile number must be 10 digits long.',
            'file.required' => 'The file field is required.',
            'file.mimes' => 'The file must be a PDF.',
        ]);

        // Capitalize the first letter of the name and convert the email to lowercase
        $name = ucfirst(strtolower($request->input('name')));
        $email = strtolower($request->input('email'));

        // Handle file upload
        $file = $request->file('file');
        $filePath = $file->store('public/files');

        // Store data in the database
        Student::create([
            'name' => $name,
            'age' => $request->input('age'),
            'email' => $email,
            'domain' => $request->input('domain'),
            'mobileno' => $request->input('mobileno'),
            'file_path' => $filePath,
        ]);

        // Flash success message to session
        return redirect()->route('form')->with('success', 'Registration successful!');
    }
}
