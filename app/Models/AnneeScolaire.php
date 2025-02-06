<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    // Ajouter les colonnes autorisées pour l'assignation de masse
    protected $fillable = ['annee_scolaire', 'debut', 'fin'];
}
