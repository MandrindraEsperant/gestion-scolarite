<?php

namespace App\Livewire;

use App\Models\Etudiant;
use Exception;
use Livewire\Component;

class EditStudent extends Component
{
    public $student;

    public $matricule, $nom, $prenom, $sexe, $adresse, $date_naissance;

    public function mount(){
        $this->matricule =$this->student->matricule;
        $this->nom =$this->student->nom;
        $this->prenom =$this->student->prenom;
        $this->sexe =$this->student->sexe;
        $this->date_naissance =$this->student->date_naissance;
        $this->adresse =$this->student->adresse;
    }

    public function store()
    {
        $student = Etudiant::find($this->student->id);

        $this->validate([
            'matricule' => 'string|required',
            'nom' => 'string|uppercase',
        ],[
            'matricule.unique'=>'Le matricule que vous avez saisie existe déjà',
            'nom.uppercase'=>'Mettre le nom en majuscule',
        ]);

        try {
            $student->matricule =$this->matricule;
            $student->nom =$this->nom;
            $student->prenom =$this->prenom;
            $student->sexe =$this->sexe;
            $student->date_naissance =$this->date_naissance;
            $student->adresse =$this->adresse;
            $student->update();

            session()->flash('success', 'Etudiants mis à jour!');
            $this->reset(['nom', 'matricule','prenom','adresse','date_naissance']);
            return to_route('student');
        } catch (Exception $e) {
            session()->flash('error', 'Une erreur est survenue. Vérifiez vos données. :' . $e->getMessage());
        }
    }

    public function render()
    {
        
        return view('livewire.edit-student');
    }
}
