<?php

use App\Mail\TaskAssignedMail;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $employees = Employee::limit(100)->get();

    // Assume the task you want to send to each employee
    $task = Task::find(1); // Replace with the actual task you want to assign

    // Loop through each employee and queue the email
    foreach ($employees as $employee) {
        Mail::to($employee->email)
            ->queue(new TaskAssignedMail($task, $employee));
    }

    return response()->json(['message' => '100 emails are being sent!']);
});
