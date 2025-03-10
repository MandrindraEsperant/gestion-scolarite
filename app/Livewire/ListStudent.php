<?php

namespace App\Livewire;

use App\Models\Etudiant;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ListStudent extends Component
{
    use WithPagination;

    public $search = '';
 
    public function delete(Etudiant $student)
    {
        $student->delete();
        session()->flash("success", "Un étudiant supprimer !");
        return to_route('student');
    }

    public function render()
    {
        $query = Etudiant::query();

        if (!empty($this->search)) {

            $query->where('matricule', 'like', '%' . $this->search . '%')
                ->orWhere('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('sexe', 'like', '%' . $this->search . '%')
                ->orWhere('date_naissance', 'like', '%' . $this->search . '%');
        }

        // Pagination par Livewire
        $students = $query->paginate(3);
        return view('livewire.list-student', compact('students'));
    }
}
