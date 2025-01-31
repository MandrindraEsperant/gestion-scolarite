<?php

namespace App\Livewire;

use App\Models\SchoolYear;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

class CreateSchoolYear extends Component
{
    public $libelle;

    public function store(SchoolYear $schoolYear)
    {
        $this->validate([
            'libelle' => 'string|required|unique:school_years,school_year' // comparer school_year dans le table school_years pour être unique
        ]);

        try {
            $currentYear = Carbon::now()->format('Y');

            $check = SchoolYear::where('current_year', $currentYear)->get();

            $alredyExist = $check->count();

            if ($alredyExist >= 1) {
                return redirect()->back()->with('error', 'L\'année en cours déjà étè ajouté');
            } else {
                $schoolYear->school_year = $this->libelle;
                $schoolYear->current_year = $currentYear;

                $schoolYear->save();

                if ($schoolYear) {
                    $this->libelle = "";
                }
                return redirect()->back()->with("succes", "Année scolaire ajouté");
            }
        } catch (Exception $e) {
            // pris en compte au cas ou on a de problème
        }
    }
    public function render()
    {
        return view('livewire.create-school-year');
    }
}
