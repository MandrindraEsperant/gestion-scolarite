<?php

namespace App\Livewire;

use App\Models\AnneeScolaire;
use App\Models\Level;
use App\Models\Niveau;
use App\Models\SchoolYear;
use Livewire\Component;
use Exception;

class CreateLevel extends Component
{
    public $niveau;
    public $prix_droit;
    public $prix_ecolage;

    public function store()
    {
        $this->validate([
            'niveau' => 'string|required',
            'prix_ecolage' => 'required',
        ]);

        try {

            // Recuperer l'année scolaire activé
            $activeSchoolYear = AnneeScolaire::where('active', '1')->first();

            Niveau::create([
                'niveau' => $this->niveau,
                'prix_ecolage' => $this->prix_ecolage,
                'prix_droit' => $this->prix_droit,
                'annee_scolaire_id' => $activeSchoolYear->id,
            ]);
            session()->flash('success', 'Niveau ajoutée avec succès!');

            $this->reset(['niveau', 'prix_ecolage']);
            return to_route('level');
            
        } catch (Exception $e) {
            session()->flash('error', 'Une erreur est survenue. Vérifiez vos données. :' . $e->getMessage());       
        }
    }

    public function render()
    {
        return view('livewire.create-level');
    }
}
