<?php

namespace App\Livewire;

use App\Models\Inscription;
use Livewire\Component;

class ListInscription extends Component
{
    public $search = '';

    public function delete(Inscription $inscription)
    {
        $inscription->delete();
        session()->flash("success", "Une inscription supprimer !");
        return to_route('inscription');
    }

    public function render()
    {
        $query = Inscription::query();

        if (!empty($this->search)) {

            $query->where('matricule', 'like', '%' . $this->search . '%')
                ->orWhere('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('sexe', 'like', '%' . $this->search . '%')
                ->orWhere('date_naissance', 'like', '%' . $this->search . '%');
        }

        // Pagination par Livewire
        $inscriptions = $query->paginate(3);
        return view('livewire.list-inscription',compact('inscriptions'));
    }
}
