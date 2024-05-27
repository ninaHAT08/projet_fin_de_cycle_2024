<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Models\Choix;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoixController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $idUtilisateur = Auth::id();

            // Vérifier si l'utilisateur est un étudiant
            $userType = users::find($idUtilisateur)->usertype;
            if ($userType === 'etudiant') {
                // Vérifier si l'utilisateur a déjà ajouté 4 sujets
                if (Choix::where('idUser3', $idUtilisateur)->count() < 4) {
                    $choixEnvoyes = Choix::where('idUser3', $idUtilisateur)->where('envoyer', true)->exists();

                    if ($choixEnvoyes) {
                        return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà envoyé vos choix et ne pouvez plus effectuer de modifications.');
                    }
                    //si le sujet et deja ajouter donc il sers pas ajouter uenautre fois 
                    $idSujet = $request->input('idSujet');
                    if (Choix::where('idUser3', $idUtilisateur)->where('idSujet1', $idSujet)->exists()) {
                        return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà ajouté ce sujet.');
                    }
                    Choix::create([
                        'idUser3' => $idUtilisateur,
                        'idSujet1' => $request->input('idSujet'),
                        'binome' => $request->input('binome_id'),
                        'date' => now() ,// Vous pouvez utiliser la date actuelle ou toute autre valeur pour la colonne 'date'
                        'envoyer' => false
                      
                   
                    ]);
                 
                    return redirect()->route('choix.ajouter')->with('success', 'Le sujet a été ajouté à votre liste.');
                } else {
                    return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà ajouté 4 sujets.');
                }
            } else {
                return redirect()->route('choix.ajouter')->with('error', 'Seuls les étudiants peuvent ajouter des sujets.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour ajouter des sujets.');
        }
    }
    public function store(Request $request)
    {
        $idUtilisateur = Auth::id();
        $userType = users::find($idUtilisateur)->usertype;
    
        if ($userType === 'etudiant') {
            if (Choix::where('idUser3', $idUtilisateur)->count() < 4) {
                $choixEnvoyes = Choix::where('idUser3', $idUtilisateur)->where('envoyer', true)->exists();

              if ($choixEnvoyes) {
             return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà envoyé vos choix et ne pouvez plus effectuer de modifications.');
             }
         
                // Ajouter le sujet à la liste de l'utilisateur

                $idSujet = $request->input('idSujet');
                if (Choix::where('idUser3', $idUtilisateur)->where('idSujet1', $idSujet)->exists()) {
                    return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà ajouté ce sujet.');
                }
                Choix::create([
                    'idUser3' => $idUtilisateur,
                    'idSujet1' => $request->input('idSujet'),
                    'binome' => $request->input('binome_id'),
                    'date' => now() ,
                    'envoyer' => false
                                      
                ]);
               
                return redirect()->route('choix.ajouter')->with('success', 'Le sujet a été ajouté à votre liste.');
            } else {
                return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà ajouté 4 sujets.');
            }
        } else {
            return redirect()->route('choix.ajouter')->with('error', 'Seuls les étudiants peuvent ajouter des sujets.');
        }
    }

   
   public function show()
   {
       $idUtilisateur = Auth::id();
       $choixs = Choix::where('idUser3', $idUtilisateur)->get();
       $etudiants = users::where('usertype', 'etudiant')->get();

       return view('choix.ajouter', ['choixs' => $choixs, 'etudiants' => $etudiants]);
    //   return view('choix.ajouter', ['choixs' => $choixs]);
   }
   public function destroy(string $id) {
    $idUser = Auth::id();

     // Vérifiez si les choix de l'utilisateur ont été envoyés
$choixEnvoyes = Choix::where('idUser3', $idUser)->where('envoyer', true)->exists();

if ($choixEnvoyes) {
    return redirect()->route('choix.ajouter')->with('error', 'Vous ne pouvez pas supprimer vos choix une fois qu\'ils ont été envoyés.');
}

// Si les choix n'ont pas été envoyés, supprimez la fiche
$fiche = Choix::findOrFail($id);
$fiche->delete();

return redirect()->route('choix.ajouter')->with('success', 'La fiche a été supprimée avec succès.');
}
    public function edit(string $id)
    {
        //
    }
    
    public function updateBinome(Request $request)
{
    $idUtilisateur = Auth::id();
    $binomeId = $request->input('binome_id');

    // Vérifiez si les choix de l'utilisateur ont été envoyés
    $choixEnvoyes = Choix::where('idUser3', $idUtilisateur)->where('envoyer', true)->exists();
    if ($choixEnvoyes) {
        return redirect()->route('choix.ajouter')->with('error', 'Vous ne pouvez pas modifier le binôme une fois que vos choix ont été envoyés.');
    }

    // Vérifiez si un binôme a été sélectionné
    if (!$binomeId) {
        return redirect()->route('choix.ajouter')->with('error', 'Veuillez sélectionner un binôme.');
    }

    // Vérifiez que le binôme sélectionné est un étudiant
    $binome = users::find($binomeId);
    if (!$binome || $binome->usertype !== 'etudiant') {
        return redirect()->route('choix.ajouter')->with('error', 'Le binôme sélectionné n\'est pas valide.');
    }

    // Vérifiez si le binôme a déjà été sélectionné par un autre utilisateur ou a déjà rempli une fiche de vœux
    $choixBinome = Choix::where(function ($query) use ($idUtilisateur, $binomeId) {
        $query->where('idUser3', $idUtilisateur)
              ->orWhere('binome', $binomeId);
    })->where('envoyer', true)->exists();

    if ($choixBinome) {
        return redirect()->route('choix.ajouter')->with('error', 'Ce binôme a déjà été choisi par un autre utilisateur ou a déjà rempli une fiche de vœux.');
    }

    // Mettez à jour le binôme pour tous les sujets de l'utilisateur
    Choix::where('idUser3', $idUtilisateur)->update(['binome' => $binomeId]);

    return redirect()->route('choix.ajouter')->with('success', 'Le binôme a été ajouté à vos sujets.');
}

  
public function envoyer(Request $request)
{
    $idUser = Auth::id();

    // Sélectionnez tous les choix de l'utilisateur
    $choixs = Choix::where('idUser3', $idUser)->get();

    // Vérifiez s'il existe des choix pour cet utilisateur
    if ($choixs->count() !== 4) {
        return redirect()->back()->with('error', 'Vous devez sélectionner exactement 4 choix avant de les envoyer.');
    }

    // Vérifiez si l'utilisateur a déjà envoyé ses choix
    $choixEnvoyes = Choix::where('idUser3', $idUser)->where('envoyer', true)->exists();
    if ($choixEnvoyes) {
        return redirect()->back()->with('error', 'Vous avez déjà envoyé vos choix et ne pouvez plus effectuer de modifications.');
    }

    // Vérifiez que chaque choix a un ordre défini
    foreach ($choixs as $choix) {
        if (is_null($choix->ordre)) {
            return redirect()->back()->with('error', 'Vous devez définir un ordre pour chaque choix avant de les envoyer.');
        }
    }

    // Mettre à jour les choix pour marquer comme envoyés
    foreach ($choixs as $choix) {
        $choix->update(['envoyer' => true]);
    }

    return redirect()->back()->with('success', 'Tous vos choix ont été envoyés avec succès.');
}


public function affectation()
{
    // Vérifiez que l'utilisateur est connecté et est un enseignant
    if (!Auth::check() || Auth::user()->usertype !== 'enseignant') {
        return redirect()->route('login')->with('error', 'Vous devez être connecté en tant qu\'enseignant pour accéder à cette page.');
    }

    $idEnseignant = Auth::id();

    // Récupérer les sujets proposés par cet enseignant
    $sujets = Sujet::where('iduser1', $idEnseignant)->pluck('idSujet');

    // Récupérer les choix pour les sujets proposés par cet enseignant où "envoyer" est à true
    $choixs = Choix::whereIn('idSujet1', $sujets)->where('envoyer', true)->get();

    return view('sujets.affectation', compact('choixs'));
}

public function updateOrdre(Request $request)
{
    $idUtilisateur = Auth::id();
    $ordreData = $request->input('ordre');

    // Valider les données pour éviter les doublons
    $counts = array_count_values($ordreData);
    foreach ($counts as $ordre => $count) {
        if ($count > 1) {
            return redirect()->route('choix.ajouter')->with('error', 'Chaque ordre doit être unique pour chaque utilisateur.');
        }
    }

    // Vérifier s'il existe déjà un choix avec les mêmes ordres pour le même utilisateur
    $existingChoices = Choix::where('idUser3', $idUtilisateur)
                             ->whereIn('ordre', $ordreData)
                             ->count();
    if ($existingChoices > 0) {
        return redirect()->route('choix.ajouter')->with('error', 'Vous avez déjà choisi un sujet avec le même ordre.');
    }

    // Mettre à jour les ordres s'ils sont valides
    foreach ($ordreData as $choixId => $ordre) {
        $choix = Choix::where('id', $choixId)
                      ->where('idUser3', $idUtilisateur)
                      ->where('envoyer', false) // Assurez-vous que le choix n'a pas encore été envoyé
                      ->first();
        if ($choix) {
            $choix->update(['ordre' => $ordre]);
        }
    }

    return redirect()->route('choix.ajouter')->with('success', 'Les ordres ont été mis à jour avec succès.');
}


}