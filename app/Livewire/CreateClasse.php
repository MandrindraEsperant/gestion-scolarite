<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Level;
use App\Models\SchoolYear;
use Exception;

class CreateClasse extends Component
{
    public $libelle;
    public $level_id;

    public function store(Classe $classe)
    {
        $this->validate([
            'libelle' => 'string|required',
            'level_id' => 'integer|required'
        ]);

        try {    
            $classe->libelle = $this->libelle;
            $classe->level_id = $this->level_id;

            $classe->save();
            if ($classe) {
                $this->libelle = "";
            }
            return redirect()->route('niveau')->with("success", "Classe ajouté");
        } catch (Exception $e) {
        }
    }

    public function render()
    {
        $activeSchoolYear= SchoolYear::where('active','1')->first();
        $currentLevels = Level::where('school_year_id', $activeSchoolYear->id)->get();
        
        return view('livewire.create-classe',compact('currentLevels'));
    }
}
