<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        return view('inscription.index');
    }

    public function create()
    {
        return view('inscription.create');
    }

    public function edit(Inscription $inscription)
    {
        return view('inscription.edit', compact('inscription'));
    }
}
