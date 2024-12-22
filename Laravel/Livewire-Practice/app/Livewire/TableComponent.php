<?php

namespace App\Livewire;

use App\Models\StudentDetail;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;

    protected $listeners = ['refreshUserTable' => '$refresh'];

    public function render()
    {
        $users = StudentDetail::paginate(10);

        return view('livewire.table-component', [
            'users' => $users,
        ]);
    }
}

