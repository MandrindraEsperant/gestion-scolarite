<?php

namespace App\Livewire;

use App\Models\Level;
use Exception;
use Livewire\Component;

class EditLevel extends Component
{
    public $level;

    public $code;
    public $libelle;
    public $scolarite;

    public function mount(){
        $this->code =$this->level->code;
        $this->libelle =$this->level->libelle;
        $this->scolarite =$this->level->scolarite;
    }

    public function store()
    {
        $level = Level::find($this->level->id);

        $this->validate([
            'code' => 'string|required', // comparer code dans le table levels pour être unique
            'libelle' => 'string|required',
            'scolarite' => 'integer|required'
        ]);

        try {
            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite;

            $level->update();

            if ($level) {
                $this->code = "";
                $this->libelle = "";
            }
            return redirect()->route('niveau')->with("success", "niveau mis à jour");
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {

        return view('livewire.edit-level');
    }
}
