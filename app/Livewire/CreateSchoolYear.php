<?php

namespace App\Livewire;

use App\Models\AnneeScolaire;
use Exception;
use Livewire\Component;

class CreateSchoolYear extends Component
{
    public $annee_scolaire, $debut, $fin;

    public function store(AnneeScolaire $schoolYear)
    {
        $this->validate([
            'annee_scolaire' => 'string|required|unique:annee_scolaires,annee_scolaire',
            'debut' => 'date|required',
            'fin' => 'date|required|after:debut', // Vérifie que 'fin' est après 'debut'
        ], [
            'annee_scolaire.unique' => 'L\'année scolaire que vous avez saisie existe déjà.',
            'annee_scolaire.required' => 'L\'année scolaire est riquis.',
            'fin.after' => 'La date de fin doit être après la date de début.',
            'fin.requiered' => 'La date de fin est requis.',
        ]);

        try {
            AnneeScolaire::create([
                'annee_scolaire' => $this->annee_scolaire,
                'debut' => $this->debut,
                'fin' => $this->fin,
            ]);

            session()->flash('success', 'Année scolaire ajoutée avec succès!');

            $this->reset(['annee_scolaire', 'debut', 'fin']);
            return to_route('setting');
        } catch (Exception $e) {
            session()->flash('error', 'Une erreur est survenue. Vérifiez vos données. :' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.create-school-year');
    }
}
