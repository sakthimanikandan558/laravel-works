<?php

namespace App\Observers;

use App\Models\Task;
use Filament\Notifications\Notification;
use Illuminate\Bus\Queueable;


class TaskObserver
{
    use Queueable;
    public function created(Task $task): void
    {
        Notification::make()
        ->title('Task Created for You' . $task->name)
        ->body('Click here to view the task.')
        ->url(route('tasks.show', $task->id)) // Add the URL to redirect to
        ->sendToDatabase($task->user);
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
