<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sujet;

class SujetController extends Controller
{
    public function gestionsujet()
    {
       $sujets = Sujet::whereHas('user1', function ($query) {
        $query->where('usertype', 'enseignant');
        })
        ->where('typeSujet', 'interne') 
        ->get();
        return view('gestionadmin.sujet', compact('sujets'));
    }
    public function index()
    {
        $sujets = Sujet::whereHas('user1', function ($query) {
         $query->where('usertype', 'enseignant');
            })
            ->where('typeSujet', 'interne') 
            ->get();
      //  return view('sujets.index', compact('sujets'));
       return view('enseignant', compact('sujets'));
    }

    public function create()
    {
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }
    
        // Vérifiez si l'utilisateur est un enseignant
        if (Auth::user()->usertype != 'enseignant') {
            return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à créer un sujet.');
        }
    
        // Récupérer les enseignants et les doctorants
        $enseignants = User::where('usertype', 'enseignant')->get();
        $doctorants = User::where('usertype', 'doctorant')->get();
    
        // Retourner la vue avec les enseignants et les doctorants
        return view('sujets.create', compact('enseignants', 'doctorants'));
    }
    public function edit($idSujet)
    {
        $sujet = Sujet::findOrFail($idSujet);
        if (!$sujet) {
            return redirect()->route('sujets.index')->with('error', 'Sujet introuvable.');
        }
        $doctorants = User::where('usertype', 'doctorant')->get();
        return view('sujets.edite', compact('sujet', 'doctorants'));
    }
    
    
    public function update(Request $request, $idSujet)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'specialite' => 'required|string',
            'mot_cle' => 'required|string',
            'anneeUniv' => 'required|string',
            'co_encadrant' => 'nullable|exists:users,id,usertype,doctorant',
        ]);
    
        $sujet = Sujet::findOrFail($idSujet);
        if (!$sujet) {
         
            return redirect()->route('sujets.index')->with('error', 'Sujet introuvable.');
        }
    
        $sujet->titre = $request->titre;
        $sujet->description = $request->description;
        $sujet->specialite = $request->specialite;
        $sujet->mot_cle = $request->mot_cle;
        $sujet->anneeUniv = $request->anneeUniv;
     
        // Mettre à jour le co-encadrant seulement s'il est sélectionné
        if ($request->has('co_encadrant')) {
            $sujet->iduser2 = $request->co_encadrant;
        } else {
            $sujet->iduser2 = null; // Assurez-vous que le co-encadrant est nul s'il n'est pas sélectionné
        }
    
        $sujet->save();

        return redirect()->route('sujets.index')->with('success', 'Sujet mis à jour avec succès.');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'specialite' => 'required|string',
            'mot_cle' => 'required|string',
            'anneeUniv' => 'required|string',
            'typeSujet' => 'required|in:interne',
            'co_encadrant' => 'nullable|exists:users,id,usertype,doctorant',
        ]);

        $sujet = new Sujet();
        $sujet->titre = $request->titre;
        $sujet->description = $request->description;
        $sujet->specialite = $request->specialite;
        $sujet->mot_cle = $request->mot_cle;
        $sujet->anneeUniv = $request->anneeUniv;
        $sujet->typeSujet = 'interne';
       // $sujet->typeSujet = $request->typeSujet;
        $sujet->iduser1 = Auth::id();
        if ($request->has('co_encadrant')) {
            $sujet->iduser2 = $request->co_encadrant;
        }
        $sujet->save();

        return redirect()->route('sujets.create')->with('success', 'Sujet créé avec succès.');
    }
public function maListe()
{
    $userId = Auth::id();
  
    // Récupérer les sujets publiés par cet enseignant
    $sujets = Sujet::where('iduser1', $userId)->get();
        // Retourner la vue avec les sujets
   // return view('sujets.maliste', compact('sujets'));
    return view ('sujets.maliste')-> with('sujets', $sujets);
}

public function destroy($idSujet)
{
    Sujet::destroy($idSujet);
  
    return redirect()->route('sujets.index')->with('flash_message', 'Sujet supprimé !');
}

public function show($idSujet)
{     
    $sujets = Sujet::findOrFail($idSujet);
  
  //  $sujets->load('user');
    return view('sujets.show')->with('sujets', $sujets);
}
public function search(){
    $q = request()->input('q');
    $sujets =  Sujet::where('titre', 'like', '%' . $q . '%')
    ->orWhere('specialite', 'like', '%' . $q . '%')
       ->orWhere('description', 'like', '%' . $q . '%')
       ->orWhere('mot_cle', 'like', '%' . $q . '%')
       ->orWhere('anneeUniv', 'like', '%' . $q . '%')
  
                   ->paginate(6);
              
return view ('sujets.search')-> with('sujets', $sujets);
}


public function valider($idSujet)
{
    $sujet = Sujet::findOrFail($idSujet);

    if ($sujet->publier) {
        // Si le sujet est déjà publié
        return redirect()->route('adminsujet')->with('error', 'Ce sujet est déjà validé et publié.');
    }

    // Sinon, valider et publier le sujet
    $sujet->publier = true;
    $sujet->save();
  
    return redirect()->route('adminsujet')->with('success', 'Sujet validé et publié avec succès dans l\'espace utilisateurs.');
}

/////afectation de sujet par lenseignant


    public function affecterSujet(Request $request, $id)
{
    // Vérifie si l'utilisateur est authentifié
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Utilisateur non authentifié.']);
    }

    // Vérifie si le sujet existe
    $sujet = Sujet::findOrFail($id);

    // Vérifie si le sujet est déjà affecté
    if ($sujet->sujet_affecter === 1) {
        return response()->json(['success' => false, 'message' => 'Le sujet est déjà affecté à un étudiant.']);
    }

    // Vérifie si l'utilisateur a déjà une affectation
    $user = Auth::user();
    if ($user->etat === true) {
        return response()->json(['success' => false, 'message' => 'L\'étudiant a déjà une affectation de sujet.']);
    }

    // Procède à l'affectation du sujet
    try {
        // Début de la transaction
        DB::beginTransaction();

        // Met à jour le sujet pour le marquer comme affecté
        $sujet->update(['sujet_affecter' => 1]);

        // Met à jour l'utilisateur pour marquer l'état comme affecté et associer le sujet
        $user->update(['etat' => true, 'idSujet' => $id]);

        // Fin de la transaction
        DB::commit();

        // Retourne une réponse JSON avec un message de succès
        return response()->json(['success' => true, 'message' => 'Sujet affecté avec succès.']);
    } catch (\Exception $e) {
        // En cas d'erreur, annule la transaction
        DB::rollBack();

        // Retourne une réponse JSON avec un message d'erreur
        return response()->json(['success' => false, 'message' => 'Une erreur s\'est produite lors de l\'affectation du sujet.']);
    }
}
}
