<?php

namespace App\Http\Controllers;

use App\Models\ChoixSujet;
use App\Models\Session;
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




   //affichage des sujet externe pour le doctorant
public function   indexdoctorant()
{ 
  
   $sujets = Sujet::where('typeSujet', 'externe')
   ->where('publier', true)
   ->get();
    return view('sujets.sujetexterneD', compact('sujets'));
  
}
public function filterSujetsDD(Request $request)
   {
       $specialite = $request->input('specialite');
       $sujetsQuery = Sujet::where('typeSujet', 'externe') // Ajout de la condition pour les sujets externes
       ->where('publier', true);
       if ($specialite) {
           // Filtrer par spécialité si spécifié
           $sujetsQuery->where('specialite', $specialite);
       }

       $sujets = $sujetsQuery->get(); // Exécuter la requête

       return view('sujets.sujetexterneD', compact('sujets'));
   }

//    public function create()
//    {
//     //    
//     if (Auth::check()) {
//         // Vérifie si l'utilisateur est un étudiant
//         if (Auth::user()->usertype != 'etudiant') {
//             // Redirige ou retourne un message d'erreur
//             return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à créer un sujet.');
//         }

//         // Vérifie si l'étudiant a déjà proposé un sujet
//         $existingSujet = Sujet::where('iduser1', Auth::id())->first();

//         // Si un sujet existe déjà pour cet utilisateur, afficher une erreur
//         if ($existingSujet) {
//             // Si l'étudiant a déjà proposé un sujet, redirige vers le tableau de bord avec un message d'erreur
//             return redirect()->route('dashboard')->with('error', 'Vous avez déjà proposé un sujet.');
//         }
//         // Si l'étudiant n'a pas encore proposé de sujet, affiche le formulaire de création de sujet externe
//         $etudiants = User::where('usertype', 'etudiant')->get();
//         return view('sujetexterne.create', compact('etudiants'));

//         // Récupère la liste des étudiants (pour les cas où vous pourriez en avoir besoin)
//         $etudiants = User::where('usertype', 'etudiant')->get();

//         return view('sujetexterne.create', compact('etudiants'));
//     } else {
//         return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
//     }
//    }
public function create()
{
    // Vérifie si l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }

    // Vérifie si l'utilisateur est un étudiant
    if (Auth::user()->usertype != 'etudiant') {
        return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à créer un sujet.');
    }

    // Vérifie la période de la session active "proposition" depuis la base de données
    $session = Session::where('intitule_session', 'Lancement des PFC')->first();

    // Vérifie si la session est définie et si la date actuelle est valide par rapport aux dates de début et fin
    if (!$session || !now()->between($session->date_debut, $session->date_fin)) {
        // if ($session && now()->gte($session->date_debut) && now()->lte($session->date_fin)) {
            
        // Si la session n'est pas valide, redirige avec un message d'erreur
        return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas proposer un sujet en dehors de la période de la session.');
    }

    // Vérifie si l'étudiant a déjà proposé un sujet
    $existingSujet = Sujet::where('iduser1', Auth::id())->first();

    // Si un sujet existe déjà pour cet utilisateur, afficher une erreur
    if ($existingSujet) {
        // Si l'étudiant a déjà proposé un sujet, redirige vers le tableau de bord avec un message d'erreur
        return redirect()->route('dashboard')->with('error', 'Vous avez déjà proposé un sujet.');
    }

    // Récupérer la liste des étudiants (pour les cas où vous pourriez en avoir besoin)
    $etudiants = User::where('usertype', 'etudiant')->get();

    // Retourner la vue avec les étudiants pour le formulaire de création de sujet externe
    return view('sujetexterne.create', compact('etudiants'));
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
   // Méthode pour voir les choix
   public function voirChoix()
   {
       $choixSujets = ChoixSujet::where('id_enseignant', Auth::id())->with('sujet')->get();

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
   
  // Méthode pour affecter les sujets

public function affecterSujets(Request $request)
{
    $user = Auth::user();

    $choixSujets = ChoixSujet::where('id_enseignant', $user->id)->get();

    foreach ($choixSujets as $choix) {
        $sujet = Sujet::find($choix->id_sujetE);

        // Vérifie si le sujet existe et n'est pas déjà affecté
        if ($sujet && !$sujet->Sujet_affecter) {
            // Vérifie l'état de l'étudiant associé à iduser1
            $etudiant = User::find($sujet->iduser1);

            // Si l'étudiant existe et a déjà une affectation de sujet
            // if ( $etudiant->etat === true) {
            //     return back()->with('error', 'Cet étudiant a déjà une affectation de sujet.');
            // }
            if ($etudiant && $etudiant->idSujet !== null) {
                return back()->with('error', 'Cet étudiant a déjà une affectation de sujet.');
            }
            // Met à jour le sujet pour indiquer qu'il est affecté
            $sujet->Sujet_affecter = true;
            $sujet->save();

            // Met à jour l'état de l'étudiant si ce n'est pas déjà fait
            if ($etudiant && $etudiant->etat !== true) {
                $etudiant->etat = true;
                $etudiant->idSujet = $choix->id_sujetE;
                $etudiant->save();
            }
        } else {
            // Si le sujet est déjà affecté, retourne un message d'erreur
            return back()->with('error', 'Le sujet est déjà affecté.');
        }
    }
    return redirect()->route('voir.choix')->with('success', 'Vous avez confirmé votre choix pour ce sujet.');
}


  



}



