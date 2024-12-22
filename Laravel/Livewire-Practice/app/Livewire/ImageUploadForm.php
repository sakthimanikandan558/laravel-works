<?php
namespace App\Livewire;

use App\Models\StudentDetail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class ImageUploadForm extends Component
{
    use WithFileUploads;

    #[Rule('required|string|min:3|max:50')]
    public $name;

    #[Rule('required|email|unique:student_details,email')]
    public $email;

    #[Rule('required|string|min:8')]
    public $password;

    #[Rule('required|image|mimes:jpg,jpeg,png|max:1024')]
    public $image;

    public function submit()
    {
        $this->validate(); // This will automatically use the attribute rules

        // Store the uploaded image
        $imagePath = $this->image->store('images', 'public');

        // Save the student details
        StudentDetail::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'img_url' => $imagePath,
        ]);

        $this->reset();

        session()->flash('message', 'Student details saved successfully!');

        $this->dispatch('student_created');
    }

    public function render()
    {
        return view('livewire.image-upload-form');
    }
}


