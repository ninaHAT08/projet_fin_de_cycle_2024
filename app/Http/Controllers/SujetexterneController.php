<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\sujetexterne;
use Illuminate\Http\Request;
use App\Models\Sujet;
use App\Models\ChoixSujet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
   
   public function filterSujets2(Request $request)
   {
       $specialite = $request->input('specialite');
       $sujetsQuery = Sujet::where('typeSujet', 'externe'); // Ajout de la condition pour les sujets externes

       if ($specialite) {
           // Filtrer par spécialité si spécifié
           $sujetsQuery->where('specialite', $specialite);
       }

       $sujets = $sujetsQuery->get(); // Exécuter la requête

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

   
   public function filterSujets5(Request $request)
   {
       $specialite = $request->input('specialite');
       $sujetsQuery = Sujet::where('typeSujet', 'externe') // Ajout de la condition pour les sujets externes
       ->where('publier', true);
       if ($specialite) {
           // Filtrer par spécialité si spécifié
           $sujetsQuery->where('specialite', $specialite);
       }

       $sujets = $sujetsQuery->get(); // Exécuter la requête

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
   
           // Vérifie si l'étudiant a déjà proposé un sujet
           $existingSujet = Sujet::where('iduser1', Auth::id())->first();
   
           // Si un sujet existe déjà pour cet utilisateur, afficher une erreur
           if ($existingSujet) {
               // Si l'étudiant a déjà proposé un sujet, redirige vers le tableau de bord avec un message d'erreur
               return redirect()->route('dashboard')->with('error', 'Vous avez déjà proposé un sujet.');
           }
   
           // Si l'étudiant n'a pas encore proposé de sujet, affiche le formulaire de création de sujet externe
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
       return redirect()->route('sujetss.create')->with('success', 'Sujet créé avec succès.');
       
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

//valider et publier le sujet externe par l'admin
   public function valider($idSujet)
      {
    $sujets = Sujet::findOrFail($idSujet);
    if ($sujets->publier) {
        // Si le sujet est déjà publié
        return redirect()->route('adminsujetexterne')->with('error', 'Ce sujet est déjà validé et publié.');
    }
   
   // Sinon, valider et publier le sujet
    $sujets->publier = true;
   $sujets->save();
  return redirect()->route('adminsujetexterne')->with('success', 'Sujet publié avec succès dans l\'espace utlisateurs.');
    }




   // Méthode pour ajouter un choix
   

   public function ajouterChoix(Request $request)
   {
       $request->validate([
           'idSujet' => 'required|exists:Sujet,idSujet',
       ]);
   
       // Vérifier si le sujet est déjà choisi par l'enseignant
       $choixExistant = ChoixSujet::where('id_enseignant', Auth::id())
                                   ->where('id_sujetE', $request->input('idSujet'))
                                   ->first();
   
       if ($choixExistant) {
           return redirect()->back()->with('error', 'Ce sujet est déjà ajouté à votre liste de choix.');
       }
   
       // Ajouter le sujet à la liste de choix de l'enseignant
       $choixSujet = new ChoixSujet();
       $choixSujet->id_enseignant = Auth::id();
       $choixSujet->id_sujetE = $request->input('idSujet');
       $choixSujet->save();
   
       return redirect()->back()->with('success', 'Sujet ajouté à votre liste de choix.');
   }
   public function voirChoix()
   {
       // Récupère les choix de sujets pour l'enseignant authentifié avec les sujets correspondants
       $choixSujets = ChoixSujet::where('id_enseignant', Auth::id())->with('sujet')->get();
   
       // Retourne la vue 'enseignantcrud.choix' en passant les choix de sujets récupérés
       return view('enseignantcrud.choix', compact('choixSujets'));
   }

   ///////////recuper les choix sujets externe pour l'etudiant
   public function voirEnseignantsChoisis()
   {
       // Vérifie si l'utilisateur est authentifié
       if (!Auth::check()) {
           return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
       }
   
       
       // Récupère l'ID de l'utilisateur connecté (étudiant)
       $userId = Auth::id();
   
       // Récupère les sujets externes proposés par l'étudiant avec les enseignants qui les ont choisis
       $sujets = Sujet::where(function ($query) use ($userId) {
                       $query->where('iduser1', $userId)
                             ->orWhere('iduser2', $userId);
                   })
                   ->with(['choixSujets' => function ($query) {
                       $query->with('enseignant'); // Charge la relation choixSujets avec enseignant
                   }])
                   ->get();
   
       // Retourne la vue avec les sujets et les choix chargés
       return view('etudiant.enseignants_choisis', compact('sujets'));
   }
   
   
   
  // Méthode pour affecter les sujets externes
  public function affecterSujets(Request $request, $id)
  {
      // Vérifie si l'utilisateur est authentifié
      if (!Auth::check()) {
          return redirect()->route('voir.choix')->with('error', 'Utilisateur non authentifié.');
      }
  
      try {
          // Début de la transaction
          DB::beginTransaction();
  
          // Vérifie si le sujet existe
          $sujet = Sujet::findOrFail($id);
  
          // Vérifie si le sujet est déjà affecté
          if ($sujet->sujet_affecter === true) {
              return redirect()->route('voir.choix')->with('error', 'Le sujet est déjà affecté à un étudiant.');
          }
  
          // Vérifie si l'utilisateur a déjà une affectation
          $user = Auth::user();
          if ($user->etat === true) {
              return redirect()->route('voir.choix')->with('error', 'L\'étudiant a déjà une affectation de sujet.');
          }
  
          // Met à jour le sujet pour le marquer comme affecté
          $sujet->update([
              'iduser2' => Auth::id(),
              'sujet_affecter' => true
          ]);
  
          // Met à jour l'utilisateur pour marquer l'état comme affecté et associer le sujet
          $user->update([
              'etat' => true,
              'idSujet' => $sujet->idSujet
          ]);
  
          // Fin de la transaction
          DB::commit();
  
          return redirect()->route('voir.choix')->with('success', 'Le sujet a été affecté avec succès.');
      } catch (\Exception $e) {
          // En cas d'erreur, annule la transaction
          DB::rollBack();
          return redirect()->route('voir.choix')->with('error', 'Une erreur s\'est produite lors de l\'affectation du sujet.');
      }
  }

}
