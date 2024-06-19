<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soutenance;
use App\Models\Session;
class SoutenanceController extends Controller
{
    public function index()
    {
 // Récupérer toutes les soutenances avec les relations
 $soutenances = Soutenance::with(['etudiant','etudiant2', 'presidentJury', 'enseignant1', 'enseignant2', 'enseignant3'])->get();
    
        // Retourner la vue avec les données des soutenances
        return view('soutenance.index', [
            'soutenances' => $soutenances,
        ]);
    }




    // Méthode pour afficher le formulaire de création de soutenance




    public function create()
    {
        // Récupérer la session active "dépôts des soutenances session normale" depuis la base de données
        $sessionNormale = Session::where('intitule_session', 'dépôts des soutenances session normale')->first();
        $sessionRattrapage = Session::where('intitule_session', 'dépôts des soutenances session rattrapage')->first();
    
        // Vérifier si la date actuelle est dans l'intervalle des dates de la session "normale" ou "rattrapage"
        if (!($sessionNormale && now()->between($sessionNormale->date_debut, $sessionNormale->date_fin)) && 
            !($sessionRattrapage && now()->between($sessionRattrapage->date_debut, $sessionRattrapage->date_fin))) {
            
            return redirect()->route('soutenance.index')->with('error', 'Vous ne pouvez pas créer une soutenance en dehors de la période de dépôt.');
        }
    
        // Récupérer la liste des étudiants et enseignants pour les sélecteurs
        $etudiants = User::where('usertype', 'etudiant')->get();
        $enseignants = User::where('usertype', 'enseignant')->get();
    
        return view('soutenance.create', [
            'etudiants' => $etudiants,
            'enseignants' => $enseignants,
        ]);
    }

// Méthode pour enregistrer une nouvelle soutenance
public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'date_soutenance' => 'required|date',
        'memoire' => 'nullable|file|mimes:pdf,doc,docx',
        'note' => 'nullable|integer|min:0|max:20',
        'etudiant_id' => 'required|exists:users,id',
        'etudiant2_id' => 'sometimes|nullable|different:etudiant_id|exists:users,id',
        'president_jury_id' => 'required|exists:users,id',
        'enseignant1_id' => 'required|different:enseignant2_id|different:president_jury_id|exists:users,id',
        'enseignant2_id' => 'required|different:enseignant1_id|different:president_jury_id|exists:users,id',
        'enseignant3_id' => 'sometimes|nullable|different:enseignant1_id|different:enseignant2_id|different:president_jury_id|exists:users,id',
    ]);

    // Trouver la session correspondante en fonction de la date de soutenance
    $dateSoutenance = new \DateTime($request->input('date_soutenance'));
    $sessionNormale = Session::where('intitule_session', 'depots des soutenances session normale')->first();
    $sessionRattrapage = Session::where('intitule_session', 'depots des soutenances session rattrapage')->first();

    $session = null;

    // Déterminer si la date de soutenance est dans l'intervalle de la session normale
    if ($sessionNormale && $dateSoutenance >= new \DateTime($sessionNormale->date_debut) && $dateSoutenance <= new \DateTime($sessionNormale->date_fin)) {
        $session = 'normale';
    } elseif ($sessionRattrapage && $dateSoutenance >= new \DateTime($sessionRattrapage->date_debut) && $dateSoutenance <= new \DateTime($sessionRattrapage->date_fin)) {
        $session = 'rattrapage';
    }

    if (!$session) {
        return redirect()->route('soutenance.index')->with('error', 'La date de soutenance n\'est pas dans une période de session valide.');
    }

    // Gestion du fichier mémoire (si présent)
    $memoirePath = $request->file('memoire') ? $request->file('memoire')->store('memoires', 'public') : null;

    // Création d'une nouvelle soutenance
    Soutenance::create(array_merge(
        $request->except('memoire'),
        [
            'memoire' => $memoirePath,
            'session' => $session
        ]
    ));

    // Redirection avec un message de succès
    return redirect()->route('soutenance.index')
                     ->with('success', 'La soutenance a été créée avec succès.');
}
public function edit($id)
{
    // Récupérer la soutenance à mettre à jour
    $soutenance = Soutenance::findOrFail($id);

    // Récupérer la liste des étudiants et enseignants pour les sélecteurs
    $etudiants = User::where('usertype', 'etudiant')->get();
    $enseignants = User::where('usertype', 'enseignant')->get();

    return view('soutenance.edit', [
        'soutenance' => $soutenance,
        'etudiants' => $etudiants,
        'enseignants' => $enseignants,
    ]);
}

public function update(Request $request, $id)
{
    // Validation des données du formulaire
    $request->validate([
        'date_soutenance' => 'required|date',
        'memoire' => 'nullable|file|mimes:pdf,doc,docx',
        'note' => 'nullable|integer|min:0|max:20',
        'etudiant_id' => 'required|exists:users,id',
        'etudiant2_id' => 'sometimes|nullable|different:etudiant_id|exists:users,id',
        'president_jury_id' => 'required|exists:users,id',
        'enseignant1_id' => 'required|different:enseignant2_id|different:president_jury_id|exists:users,id',
        'enseignant2_id' => 'required|different:enseignant1_id|different:president_jury_id|exists:users,id',
        'enseignant3_id' => 'sometimes|nullable|different:enseignant1_id|different:enseignant2_id|different:president_jury_id|exists:users,id',
    ]);

    // Trouver la session correspondante en fonction de la date de soutenance
    $dateSoutenance = new \DateTime($request->input('date_soutenance'));
    $sessionNormale = Session::where('intitule_session', 'depots des soutenances session normale')->first();
    $sessionRattrapage = Session::where('intitule_session', 'depots des soutenances session rattrapage')->first();

    $session = null;

    // Déterminer si la date de soutenance est dans l'intervalle de la session normale
    if ($sessionNormale && $dateSoutenance >= new \DateTime($sessionNormale->date_debut) && $dateSoutenance <= new \DateTime($sessionNormale->date_fin)) {
        $session = 'normale';
    } elseif ($sessionRattrapage && $dateSoutenance >= new \DateTime($sessionRattrapage->date_debut) && $dateSoutenance <= new \DateTime($sessionRattrapage->date_fin)) {
        $session = 'rattrapage';
    }

    if (!$session) {
        return redirect()->route('soutenance.index')->with('error', 'La date de soutenance n\'est pas dans une période de session valide.');
    }

    // Gestion du fichier mémoire (si présent)
    $memoirePath = $request->file('memoire') ? $request->file('memoire')->store('memoires', 'public') : null;

    // Récupérer la soutenance existante
    $soutenance = Soutenance::findOrFail($id);

    // Mettre à jour les champs de la soutenance
    $soutenance->date_soutenance = $request->input('date_soutenance');
    $soutenance->note = $request->input('note');
    $soutenance->etudiant_id = $request->input('etudiant_id');
    $soutenance->etudiant2_id = $request->input('etudiant2_id');
    $soutenance->president_jury_id = $request->input('president_jury_id');
    $soutenance->enseignant1_id = $request->input('enseignant1_id');
    $soutenance->enseignant2_id = $request->input('enseignant2_id');
    $soutenance->enseignant3_id = $request->input('enseignant3_id');
    $soutenance->session = $session;

    if ($memoirePath) {
        $soutenance->memoire = $memoirePath;
    }

    // Sauvegarder les modifications
    $soutenance->save();

    // Redirection avec un message de succès
    return redirect()->route('soutenance.index')
                     ->with('success', 'La soutenance a été mise à jour avec succès.');
}










}
