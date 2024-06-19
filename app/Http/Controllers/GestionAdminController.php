<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GestionAdminController extends Controller
{
    public function index(Request $request)
    {
        
        
      
            // Si aucun filtre de spécialité, récupérer tous les sujets
            $sujets = Sujet::all();
        
        
        // Retourner la vue avec les sujets
        return view('gestionadmin.sujet', compact('sujets'));
    }
   

    public function sujetsParEnseignant()
    {
$nombreDeSujetsParEnseignant = DB::table('users')
->leftJoin('sujet', 'users.id', '=', 'sujet.iduser1')
->select('users.nom', 'users.prenom','users.usertype' )
->selectRaw('COUNT(sujet.idSujet) as nombre_de_sujets')

->groupBy('users.id', 'users.nom', 'users.prenom','users.usertype')
->havingRaw('COUNT(sujet.idSujet) > 0')
->get();
$nombreTotalDeSujets = DB::table('sujet')->count();

$nombreDeSujetsPublies = DB::table('sujet')->where('publier', true)->count();


// Retourner la vue avec les résultats
return view('sujets.nbrsujet', compact('nombreDeSujetsParEnseignant', 'nombreTotalDeSujets', 'nombreDeSujetsPublies'));
}


public function etudiantsAvecSujets()
{
    // Récupérer la liste des étudiants avec leurs sujets
    $etudiantsAvecSujets = DB::table('users')
        ->join('sujet', 'users.idSujet', '=', 'sujet.idSujet')
        ->select('users.nom', 'users.prenom', 'users.specialite', 'sujet.titre')
        ->where('users.usertype', 'etudiant')
        ->where('users.etat', true)
        ->get();

    // Retourner la vue avec les résultats
    //return view('sujets.nbraffectation', compact('etudiantsAvecSujets'));
    $nombreEtudiantsEtatTrue = DB::table('users')
    ->where('usertype', 'etudiant')
    ->where('etat', true)
    ->count();

// Retourner la vue avec les résultats
return view('sujets.nbraffectation', compact('etudiantsAvecSujets', 'nombreEtudiantsEtatTrue'));
}
public function etudiantsAvecEtatNullOuFalse()
{
    // Récupérer la liste des étudiants avec leurs sujets où l'état est null ou false
    $etudiantsAvecEtatNullOuFalse = DB::table('users')
        // ->join('sujet', 'users.idSujet', '=', 'sujet.idSujet')
        // ->select('users.nom', 'users.prenom')
        ->where('users.usertype', 'etudiant')
        ->where(function($query) {
            $query->whereNull('users.etat')
                  ->orWhere('users.etat', false);
        })
        ->get();

    // Récupérer le nombre total d'étudiants avec etat null ou false
    $nombreEtudiantsEtatNullOuFalse = DB::table('users')
        ->where('usertype', 'etudiant')
        ->where(function($query) {
            $query->whereNull('etat')
                  ->orWhere('etat', false);
        })
        ->count();

    // Retourner la vue avec les résultats
    return view('sujets.nbrnonaffectation', compact('etudiantsAvecEtatNullOuFalse', 'nombreEtudiantsEtatNullOuFalse'));
}

public function getSujetsStatistiques()
{
    // Récupérer le nombre total de sujets
    $nombreTotalDeSujets = DB::table('sujet')->count();

    // Récupérer le nombre de sujets affectés
    $nombreSujetsAffectes = DB::table('sujet')
    ->where('sujet_affecter', true)
    ->count();

    // Retourner les données en JSON
    return response()->json([
        'nombreTotalDeSujets' => $nombreTotalDeSujets,
        'nombreSujetsAffectes' => $nombreSujetsAffectes,
        'nombreSujetsNonAffectes' => $nombreTotalDeSujets - $nombreSujetsAffectes
    ]);
}

}
