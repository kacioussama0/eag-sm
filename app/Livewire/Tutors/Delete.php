<?php

namespace App\Livewire\Tutors;

use App\Models\Tutor;
use Livewire\Component;

class Delete extends Component
{

    public $tutorId;

    public function deleteTutor()
    {
        $tutor = Tutor::find($this->tutorId);
        $tutor->delete();

        session()->flash('message', 'Tutor deleted successfully.');

    }

    public function render()
    {
        return view('livewire.tutors.delete');
    }
}
