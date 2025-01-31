<?php

namespace App\Livewire;

use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithPagination;

class Setting extends Component
{
    use WithPagination;

    public $search = '';

    public function toggleStatus(SchoolYear $schoolYear){
        $query = SchoolYear::where('active','1')->update(['active'=>'0']);
        $schoolYear->active='1';
        $schoolYear->save();
        $this->render();
    }
  
    public function render()
    {
        $query = SchoolYear::query()->orderBy('school_year', 'desc');

        if (!empty($this->search)) {
            $query->where('school_year', 'like', '%' . $this->search . '%');
        }
    
        // Pagination par Livewire
        $schoolYearList = $query->paginate(3);

        return view('livewire.setting', compact('schoolYearList'));
    }
}
