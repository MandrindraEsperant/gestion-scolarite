<?php

namespace App\Livewire;

use App\Models\AnneeScolaire;
use App\Models\Niveau;
use Livewire\Component;
use Livewire\WithPagination;

class ListNiveau extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(Niveau $level)
    {
        $level->delete();
        session()->flash("success", "Un niveau supprimer ");
        return to_route('level');
    }

    public function render()
    {
        $levels=[];
        $schoolYear = AnneeScolaire::where('active', '1')->first();
        if (!$schoolYear) {
            $levels = [];
        } else {
            $query = Niveau::where('annee_scolaire_id', $schoolYear->id);
            if (!empty($this->search)) {
                $query->where('niveau', 'like', '%' . $this->search . '%')->orWhere('prix_ecolage', 'like', '%' . $this->search . '%');
            }

            // Pagination par Livewire
            $levels = $query->paginate(3);
        }
        return view('livewire.list-niveau', compact('levels'));
    }
}
