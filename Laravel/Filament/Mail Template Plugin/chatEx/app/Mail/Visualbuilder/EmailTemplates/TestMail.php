<?php

namespace App\Mail\Visualbuilder\EmailTemplates;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Visualbuilder\EmailTemplates\Traits\BuildGenericEmail;

class TestMail extends Mailable
{
    use Queueable;
    use SerializesModels;
    use BuildGenericEmail;

    public $template = 'test-mail';
    public $user;
    public $sendTo;
    public Employee $employee;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
        $this->sendTo = $employee->email;
    }
}
