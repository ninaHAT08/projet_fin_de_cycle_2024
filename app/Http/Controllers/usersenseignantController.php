<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\users;
class usersenseignantController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enseignantcrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nom' => 'required|string|max:255',
//             'prenom' => 'required|string|max:255',
//             'date_naiss' => 'required|date',
//             'grade' => 'required|string|max:255',
//             'diplome' => 'required|string|max:255',
//             'annee_rec' => 'required|integer',
//          //   'domaine_exp' => 'required|array',// de type tableau 
//          'domaine_exp' => 'required|string|max:255',
//             'usertype' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:8',
//         ]);
// // Récupération des domaines d'expertise sélectionnés depuis la requête
// //$selectedDomains = $request->input('domaine_exp');

// // Conversion du tableau en chaîne de caractères séparée par une virgule et un espace
// //$selectedDomainsString = implode(", ", $selectedDomains);
//         // Hash du mot de passe
//         $hashedPassword = Hash::make($request->input('password'));

//       //  try {
//             // Conversion du tableau de domaines d'expertise en JSON
//          //   $domaines = json_encode($request->input('domaine_exp'));

//             // Création de l'enseignant avec mot de passe hashé
//             $enseignant = new Users([
//                 'nom' => $request->input('nom'),
//                 'prenom' => $request->input('prenom'),
//                 'date_naiss' => $request->input('date_naiss'),
//                 'grade' => $request->input('grade'),
//                 'diplome' => $request->input('diplome'),
//                 'annee_rec' => $request->input('annee_rec'),
//              //   'domaine_exp' => $domaines,
//                 'domaine_exp' => $request->input('domaine_exp'),
//                 'email' => $request->input('email'),
//                 'password' => $hashedPassword,
//                 'usertype' => 'enseignant',
//             ]);

//          // Enregistrement de l'enseignant dans la base de données
//         $enseignant->save();

//         // Redirection avec un message de réussite
//         return redirect('enseignantt')->with('success', 'Enseignant ajouté avec succès!');
//    // } catch (\Exception $e) {
//         // Redirection avec un message d'erreur en cas d'échec
//       ///  return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de l\'enseignant.');
//     //}
//     }

public function store(Request $request)
    {
       // $input = $request->all();
       // users::create($input);
       // return redirect('enseignantt')->with('flash_message', 'Student Addedd!');  

       $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'date_naiss' => 'required|date',
        'grade' => 'required|string|max:255',
        'diplome' => 'required|string|max:255',
        'annee_rec' => 'required|integer',
      
        'domaine_exp' => 'required|string|max:255',
        'usertype' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Hash du mot de passe
    $hashedPassword = Hash::make($request->input('password'));

    // Création de l'enseignant avec mot de passe hashé
    $enseignant = new Users([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'date_naiss' => $request->input('date_naiss'),
        'grade' => $request->input('grade'),
        'diplome' => $request->input('diplome'),
        'annee_rec' => $request->input('annee_rec'),
        'domaine_exp' => $request->input('domaine_exp'),
        'email' => $request->input('email'),
        'password' => $hashedPassword,
        'usertype' => 'enseignant', // Assurez-vous d'ajouter le type d'utilisateur
        // Ajoutez d'autres champs du formulaire au besoin
    ]);

    // Enregistrement de l'enseignant dans la base de données
    $enseignant->save();

    // Redirection avec un message de réussite
    return redirect('enseignantt')->with('flash_message', 'Enseignant ajouté avec succès!');
}

    public function show(string $id)
    {
        //
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
        users::destroy($id);
        return redirect('enseignantt')->with('flash_message', 'Student deleted!');  
    }
}
