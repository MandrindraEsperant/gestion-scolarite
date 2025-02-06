<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    // Ajouter les colonnes autorisées pour l'assignation de masse
    protected $fillable = ['matricule', 'nom', 'prenom','sexe','date_naissance','addresse'];
}
