<?php

namespace App\Livewire;

use App\Models\StudentDetail;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class TestComponent extends Component
{
    use WithPagination;

    #[On('student_created')]
    public function render()
    {
        $users = StudentDetail::paginate(3);

        return view('livewire.test-component', [
            'users' => $users,
        ]);
    }
}