<?php

namespace App\Livewire;

use App\Models\Level;
use App\Models\SchoolYear;
use Livewire\Component;
use Exception;

class CreateLevel extends Component
{
    public $code;
    public $libelle;
    public $scolarite;

    public function store(Level $level)
    {
        $this->validate([
            'code' => 'string|required|unique:levels,code', // comparer code dans le table levels pour être unique
            'libelle' => 'string|required|unique:levels,libelle',
            'scolarite' => 'integer|required'
        ]);

        try {

            // Recuperer l'année scolaire activé
            $activeSchoolYear = SchoolYear::where('active','1')->first();

            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite;
            $level->school_year_id = $activeSchoolYear->id;

            $level->save();

            if ($level) {
                $this->code = "";
                $this->libelle = "";
            }
            return redirect()->route('niveau')->with("success", "niveau ajouté");
        } catch (Exception $e) {
        }
    }

    public function render()
    {
        return view('livewire.create-level');
    }
}
