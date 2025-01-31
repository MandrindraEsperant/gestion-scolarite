<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ListStudent extends Component
{
    use WithPagination;

    public $search = '';


    public function render()
    {
        $query = Student::query();

        if (!empty($this->search)) {

            $query->where('matricule', 'like', '%' . $this->search . '%')->orWhere('code', 'like', '%' . $this->search . '%')->orWhere('nom', 'like', '%' . $this->search . '%')->orWhere('code', 'like', '%' . $this->search . '%')->orWhere('prenom', 'like', '%' . $this->search . '%')->orWhere('code', 'like', '%' . $this->search . '%');
        }
    
        // Pagination par Livewire
        $students = $query->paginate(3);
        return view('livewire.list-student', compact('students'));
    }
}
