<?php

namespace App\Http\Controllers;
use App\Models\fiches;
use App\Models\User;
use App\Models\sujets;
//use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class FicheController extends Controller
{
   
    public function index(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            $iduser = Auth::id();

            // Vérifier si l'utilisateur a déjà ajouté 4 sujets
            if (fiches::where('iduser', $iduser)->count() < 4) {
                // Ajouter le sujet à la liste de l'utilisateur
                fiches::create([
                    'iduser' => $iduser,
                    'idSujets' => $request->input('idSujet')
                ]);

                return redirect()->route('fiche.ajouter')->with('success', 'Le sujet a été ajouté à votre liste.');
            } else {
                return redirect()->route('fiche.ajouter')->with('error', 'Vous avez déjà ajouté 4 sujets.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour ajouter des sujets.');
        }
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    $idUtilisateur = Auth::id();
     $userType = User::find($idUtilisateur)->usertype;

        if ($userType === 'etudiant') {
           if (fiches::where('iduser', $idUtilisateur)->count() < 4) {
        // Ajouter le sujet à la liste de l'utilisateur
               fiches::create([
            'iduser' => $idUtilisateur,
             'idSujets' => $request->input('idSujet')
             ]);
             $fiches = sujets::latest()->paginate(10);
        
             foreach ($fiches as $fiche) {
                 $fiche->user = User::find($fiche->iduser);
         }
         return redirect()->route('fiche.ajouter')->with('success', 'Le sujet a été ajouté à votre liste.');
            } else {
        return redirect()->route('fiche.ajouter')->with('error', 'Vous avez déjà ajouté 4 sujets.');
             }
            } else {
          return redirect()->route('fiche.ajouter')->with('error', 'Seuls les étudiants peuvent ajouter des sujets.');
            }

   }
    
    /**
     * Display the specified resource.
     */
    public function show( $idfiche)
    {
       // $fiches = fiches::all();
// return view('fiche.ajouter', ['fiches' => $fiches]);
$idUtilisateur = Auth::id();

// Récupérer les fiches de l'utilisateur connecté
$fiches = Fiches::where('iduser', $idUtilisateur)->get();

// Passer les fiches à la vue
return view('fiche.ajouter', ['fiches' => $fiches]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $fiche = fiches::findOrFail($id);
    $fiche->delete();
    return redirect()->route('fiche.ajouter')->with('success', 'La fiche a été supprimée avec succès.');
    }
   

    
   


    
}