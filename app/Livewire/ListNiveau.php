<?php

namespace App\Livewire;

use App\Models\Level;
use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithPagination;

class ListNiveau extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(Level $level)
    {
        $level->delete();
        return redirect()->route('niveau')->with("success", "niveau mis à jour");
    }


    public function render()
    {
        $schoolYear= SchoolYear::where('active','1')->first();
        $query = Level::where('school_year_id',$schoolYear->id);

        if (!empty($this->search)) {

            $query->where('libelle', 'like', '%' . $this->search . '%')->orWhere('code', 'like', '%' . $this->search . '%');
        }
    
        // Pagination par Livewire
        $levels = $query->paginate(3);
        return view('livewire.list-niveau', compact('levels'));
    }
}
