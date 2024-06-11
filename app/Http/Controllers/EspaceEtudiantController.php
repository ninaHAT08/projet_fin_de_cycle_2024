<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use Illuminate\Http\Request;

class EspaceEtudiantController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // Récupérer les sujets publiés et non affectés qui sont de type interne
    $sujets = Sujet::where('publier', true)
    ->where('typeSujet', 'interne')
    ->where('sujet_affecter', false)
    ->get();
=======
        $sujets = Sujet::where('publier', true)
        ->where('typeSujet', 'interne')
        ->where('Sujet_affecter', false)
        ->get();

>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
        // Retourner la vue avec les sujets publiés
        return view('espaceetudiant', compact('sujets'));
    }
    

    public function filterSujets3(Request $request)
   {
       $specialite = $request->input('specialite');
       $sujetsQuery = Sujet::where('typeSujet', 'interne')
       ->where('publier', true)
       ->where('sujet_affecter', false);
       if ($specialite) {
           // Filtrer par spécialité si spécifié
           $sujetsQuery->where('specialite', $specialite);
       }

       $sujets = $sujetsQuery->get(); // Exécuter la requête

       return view('espaceetudiant', compact('sujets'));
   }
   
   
   
   
   
   
    public function indexpublier()
    {
        $sujets = Sujet::where('publier', true)
        ->where('typeSujet', 'interne')
        ->get();

        // Retourner la vue avec les sujets publiés
        return view('sujets.sujetpublier', compact('sujets'));
    }
    public function filterSujets4(Request $request)
    {
        $specialite = $request->input('specialite');
        $sujetsQuery = Sujet::where('typeSujet', 'interne')
        ->where('publier', true);
        
        if ($specialite) {
            // Filtrer par spécialité si spécifié
            $sujetsQuery->where('specialite', $specialite);
        }
 
        $sujets = $sujetsQuery->get(); // Exécuter la requête
 
        return view('sujets.sujetpublier', compact('sujets'));
    }



}
