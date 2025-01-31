<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Level;
use App\Models\SchoolYear;
use Exception;
use Livewire\Component;

class EditClasse extends Component
{
    public $classe;
    public $libelle;
    public $level_id;
    public function mount(){
        $this->libelle = $this->classe->libelle;
        $this->level_id = $this->classe->level_id;
    }

    public function update(){
        $classe = Classe::find($this->classe->id);

        $this->validate([
            'libelle' => 'string|required',
            'level_id' => 'integer|required'
        ]);

        try {
            $classe->libelle = $this->libelle;
            $classe->level_id = $this->level_id;

            $classe->update();

            if ($classe) {
                $this->libelle = "";
            }
            return redirect()->route('niveau')->with("success", "Classe mis à jour");
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {
        $activeSchoolYear= SchoolYear::where('active','1')->first();
        $currentLevels = Level::where('school_year_id', $activeSchoolYear->id)->get();
        return view('livewire.edit-classe', compact('currentLevels'));
    }
}
