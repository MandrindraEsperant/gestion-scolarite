<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithPagination;

class ListClasse extends Component
{
    use WithPagination;
    public $search = '';

    public function delete(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classe',$classe->libelle)->with("success", "Classe supprimer");
    }
    public function render()
    {   
    
        $activeSchoolYear = SchoolYear::where('active','1')->first() ;

        $query = Classe::with('level')->whereRelation('level','school_year_id',$activeSchoolYear->id);

        if (!empty($this->search)) {

            $query->where('libelle', 'like', '%' . $this->search . '%');
        }
    
        // Pagination par Livewire
        $classes = $query->paginate(3);
        return view('livewire.list-classe',compact('classes'));
    }
}
