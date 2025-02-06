<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    // Ajouter les colonnes autorisées pour l'assignation de masse
    protected $fillable = ['niveau','prix_droit' ,'prix_ecolage', 'annee_scolaire_id'];
}
