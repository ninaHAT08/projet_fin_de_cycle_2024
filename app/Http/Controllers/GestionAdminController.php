<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use Illuminate\Http\Request;

class GestionAdminController extends Controller
{
    public function index()
    {
        // Récupérer tous les sujets
        $sujets = Sujet::all(); 
        // Retourner la vue avec les sujets
        return view('gestionadmin.sujet', compact('sujets'));
    }
   
}
