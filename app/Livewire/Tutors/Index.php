<?php

namespace App\Livewire\Tutors;

use App\Models\Tutor;
use Livewire\Component;

class Index extends Component
{

    public $tutors;

    public function mount()
    {
        $this->tutors = Tutor::all();
    }


    public function deleteTutor($tutorId)
    {
        $tutor = Tutor::findorFail($tutorId);

        $tutor->delete();

        session()->flash('message', 'Tutor deleted successfully.');

    }

    public function render()
    {
        return view('livewire.tutors.index');
    }
}
