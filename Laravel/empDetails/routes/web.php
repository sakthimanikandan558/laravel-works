<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\EmptabController;

// Route::get('/', [EmptabController::class, 'insertHardcodedValues']);



Route::get('/', function(){
    $employees = [
        ['name' => 'Sakthi', 'email' => 'sakthi@gmail.com', 'salary' => 50000, 'position' => 'Developer', 'department' => 'IT'],
        ['name' => 'Sankari', 'email' => 'sankari@gmail.com', 'salary' => 60000, 'position' => 'Manager', 'department' => 'HR'],
        ['name' => 'Kali', 'email' => 'kali@gmail.com', 'salary' => 55000, 'position' => null, 'department' => 'Unknown'],
    ];
    $employeeCount = count($employees);
    return view('success', compact('employees', 'employeeCount'));
});
