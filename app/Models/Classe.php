<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded =[''];
    //un niveau peut associé au pliseur classe
    //un classe appartient à un seul niveau
    public function level(){
        return $this->belongsTo(Level::class);
    }
}
