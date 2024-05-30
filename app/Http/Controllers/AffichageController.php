<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sujet;
class AffichageController extends Controller
{
    public function showAffectationNotification()
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Charger la vue de notification et passer l'utilisateur comme données
        return view('affichage.affectation', compact('user'));
    }
}
