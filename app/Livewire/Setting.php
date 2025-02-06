<?php

namespace App\Livewire;

use App\Models\AnneeScolaire;
use Livewire\Component;
use Livewire\WithPagination;

class Setting extends Component
{
    use WithPagination;

    public $search = '';

    public function toggleStatus(AnneeScolaire $schoolYear){
        $query = AnneeScolaire::where('active','1')->update(['active'=>'0']);
        $schoolYear->active='1';
        $schoolYear->save();
        $this->render();
    }
  
    public function render()
    {
        $query = AnneeScolaire::query()->orderBy('annee_scolaire', 'desc');

        if (!empty($this->search)) {
            $query->where('annee_scolaire', 'like', '%' . $this->search . '%');
        }
    
        // Pagination par Livewire
        $schoolYearList = $query->paginate(3);

        return view('livewire.setting', compact('schoolYearList'));
    }
}
