<?php

namespace App\Livewire;

use App\Models\Etudiant;
use Exception;
use Livewire\Component;

class CreateStudent extends Component
{
    public $matricule, $nom, $prenom, $sexe, $adresse, $date_naissance;

    public function store()
    {
        $this->validate([
            'matricule' => 'string|required|unique:etudiants,matricule',
            'nom' => 'string|uppercase',
        ],[
            'matricule.unique'=>'Le matricule que vous avez saisie existe déjà',
            'nom.uppercase'=>'Mettre le nom en majuscule',
        ]);

        try {

            Etudiant::create([
                'matricule' => $this->matricule,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'sexe' => $this->sexe,
                'adresse' => $this->adresse,
                'date_naissance' => $this->date_naissance,
    
            ]);
            session()->flash('success', 'Etudiant ajoutée avec succès!');

            $this->reset(['nom', 'matricule','prenom','adresse','date_naissance']);
            return to_route('student');
        } catch (Exception $e) {
            session()->flash('error', 'Une erreur est survenue. Vérifiez vos données. :' . $e->getMessage());       
        }
    }
    public function render()
    {
        return view('livewire.create-student');
    }
}
