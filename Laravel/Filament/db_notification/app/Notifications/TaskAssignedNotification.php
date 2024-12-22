<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class TaskAssignedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'New Task Assigned: ' . $this->task->name,
            'description' => 'You have been assigned a new task.',
            'task_id' => $this->task->id,
        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Task Assigned: ' . $this->task->name,
            'description' => 'You have been assigned a new task.',
            'task_id' => $this->task->id,
        ];
    }
}

