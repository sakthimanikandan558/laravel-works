<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    #[Rule('required|min:3|max:50')]
    public $name;
    public $search;

    public function create()
    {
        $this->validate();

        Todo::create(['name' => $this->name]);

        // Optionally reset the input field after creation
        $this->name = '';

        session()->flash('msg','saved');
    }

    public function delete($todoId){
        Todo::destroy($todoId);
    }

    public function toggle($todoId){
        $todo=Todo::find($todoId);
        $todo->update(['completed' => !$todo->completed]);
    }
    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5),
        ]);
    }
}
