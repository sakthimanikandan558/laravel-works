<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Task; // Import your Task model
use App\Models\Employee; // Import your Employee model

class TaskAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $employee;

    /**
     * Create a new message instance.
     */
    public function __construct(Task $task, Employee $employee)
    {
        $this->task = $task;
        $this->employee = $employee;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Task Assigned')
                    ->view('emails.task-assigned');
    }
}
