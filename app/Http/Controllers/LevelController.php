<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Level;
use App\Models\Niveau;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return view('niveau.list');
    }

    public function create()
    {
        return view('niveau.create');
    }

    public function edit(Niveau $level)
    {
        return view('niveau.edit', compact('level'));
    }
    
    public function classe()
    {
        // return view('niveau.classe', compact('classe'));
        return view('niveau.classe');
    }
    public function create_classe()
    {
        return view('niveau.create-classe');

    }
    public function edit_classe(Classe $classe)
    {
        return view('niveau.edit-classe', compact('classe'));

    }
}
