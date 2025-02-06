<?php

namespace App\Livewire;

use App\Models\Level;
use App\Models\Niveau;
use Exception;
use Livewire\Component;

class EditLevel extends Component
{
    public $level;

    public $niveau;
    public $prix_ecolage;
    public $prix_droit;

    public function mount(){
        $this->niveau =$this->level->niveau;
        $this->prix_ecolage =$this->level->prix_ecolage;
        $this->prix_droit =$this->level->prix_droit;
    }

    public function store()
    {
        $level = Niveau::find($this->level->id);

        $this->validate([
            'niveau' => 'string|required',
            'prix_ecolage' => 'required',
        ]);

        try {
            $level->niveau = $this->niveau;
            $level->prix_ecolage = $this->prix_ecolage;
            $level->prix_droit = $this->prix_droit;
            $level->update();

            session()->flash('success', 'Niveau mis à jour!');

            $this->reset(['niveau', 'prix_ecolage']);
            return to_route('level');
        } catch (Exception $e) {
            session()->flash('error', 'Une erreur est survenue. Vérifiez vos données. :' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-level');
    }
}
