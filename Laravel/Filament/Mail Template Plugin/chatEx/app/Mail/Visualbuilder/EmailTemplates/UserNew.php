<?php

namespace App\Mail\Visualbuilder\EmailTemplates;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Visualbuilder\EmailTemplates\Traits\BuildGenericEmail;
use App\Models\Employee;

class UserNew extends Mailable
{
    use Queueable, SerializesModels, BuildGenericEmail;

    public string $template = 'user-new'; // Email template key
    public string $sendTo;
    public Employee $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
        $this->sendTo = $employee->email;
    }
}
