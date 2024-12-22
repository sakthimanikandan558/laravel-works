<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function afterCreate()
    {
        $task = $this->record;
        Notification::make()
        ->title('Task Created for You ' . $task->name)
        ->sendToDatabase($task->user);
    }
}
