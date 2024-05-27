<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use Illuminate\Http\Request;

class EspaceEtudiantController extends Controller
{
    public function index()
    {
        $sujets = Sujet::where('publier', true)
        ->where('typeSujet', 'interne')
        ->get();

        // Retourner la vue avec les sujets publiés
        return view('espaceetudiant', compact('sujets'));
    }
}
