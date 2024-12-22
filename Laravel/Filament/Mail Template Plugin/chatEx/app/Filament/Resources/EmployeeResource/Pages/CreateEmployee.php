<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Mail\Visualbuilder\EmailTemplates\TestMail;
use App\Mail\Visualbuilder\EmailTemplates\UserNew;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function afterCreate()
    {
        $employee = $this->record; // Get the created employee record
        Mail::to($employee->email)->send(new TestMail($employee));
    }
}
