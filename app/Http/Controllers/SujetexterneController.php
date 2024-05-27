<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\sujetexterne;
use Illuminate\Http\Request;
use App\Models\Sujet;
use Illuminate\Support\Facades\Auth;
class SujetexterneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   //affichage dans l'espace sujet externe de l'etudiant 
   public function index()
   {
      $sujets = Sujet::where('typeSujet', 'externe')
                    ->where('publier', true)
                    ->get();
   return view('sujetexterne.index', compact('sujets'));
   }
   //affichage pour admin les sujet externe
   public function indexadmin()
   { 
       $sujets = Sujet::where('typeSujet', 'externe')->get();
       return view('gestionadmin.sujetexterne', compact('sujets'));
    
   }
   //affichage des sujet externe pour l'enseignant
   public function indexenseignant()
   { 
      // $sujets = sujets::where('typeSujet', 'externe')->get();
      $sujets = Sujet::where('typeSujet', 'externe')
      ->where('publier', true)
      ->get();
       return view('sujets.sujetexterne', compact('sujets'));
     
   }

   public function create()
   {
       if (Auth::check()) {
           // Vérifie si l'utilisateur est un étudiant
           if (Auth::user()->usertype != 'etudiant') {
               // Redirige ou retourne un message d'erreur
               return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à créer un sujet.');
           }
       $etudiants = User::where('usertype', 'etudiant')->get();
   
           return view('sujetexterne.create', compact('etudiants'));
       } else {
           return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
       }
   }

   public function store(Request $request)
   {
      
       $request->validate([
           'titre' => 'required|string|max:255',
           'description' => 'required|string',
           'specialite' => 'required|string|max:255',
           'mot_cle' => 'required|string|max:255',
           'anneeUniv' => 'required|integer',
           'nomEntreprise' => 'required_if:typeSujet,externe|string|max:255',
           'maitre_du_stage' => 'required_if:typeSujet,externe|string|max:255',
       ]);

       $sujet = new Sujet();
       $sujet->titre = $request->titre;
       $sujet->description = $request->description;
       $sujet->specialite = $request->specialite;
       $sujet->mot_cle = $request->mot_cle;
       $sujet->anneeUniv = $request->anneeUniv;
       $sujet->typeSujet = 'externe'; // Défini par défaut comme externe
       $sujet->nomEntreprise = $request->nomEntreprise;
       $sujet->maitre_du_stage = $request->maitre_du_stage;
       $sujet->iduser1 = Auth::id(); // Récupère l'ID de l'utilisateur connecté
       $sujet->save();
         return redirect()->route('sujetss.create')->with('success', 'Sujet créé avec succès!');
       
}
   /**
    * Display the specified resource.
    */
   public function show($idsujete)
   {
      $sujets = Sujet::findOrFail($idsujete);
      return view('sujetexterne.show')->with('sujets', $sujets);
   }
 

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
       //
   }

 
   public function update(Request $request, string $id)
   {
       //
   }

  
   public function destroy($idsujete)
   { 
    Sujet::destroy($idsujete);
  
       return redirect('sujetss')->with('flash_message', 'Sujet supprimé !');
 }
   public function mmaListe()
{
   $userId = Auth::id();
   $sujets = Sujet::where('iduser1', $userId)->get();
   return view ('sujetexterne.monsujet')-> with('sujets', $sujets);
}


   public function valider($idSujet)
      {
    $sujets = Sujet::findOrFail($idSujet);
   $sujets->publier = true;
   $sujets->save();
  return redirect()->route('adminsujetexterne')->with('success', 'Sujet publié avec succès dans l\'espace étudiant.');
    }
}
