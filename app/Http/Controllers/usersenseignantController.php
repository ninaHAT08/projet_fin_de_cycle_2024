<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\User;
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

    

    public function store(Request $request)
    {
       // $input = $request->all();
       // users::create($input);
       // return redirect('enseignantt')->with('flash_message', 'Student Addedd!');  

       $validatedData = $request->validate([
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'date_naiss' =>  'nullable|date',
        'grade' => 'nullable|string|max:255',
        'diplome' => 'nullable|string|max:255',
        'annee_rec' => 'nullable|integer',
      
        'domaine_exp' => 'nullable|string|max:255',
        'usertype' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Hash du mot de passe
    $hashedPassword = Hash::make($request->input('password'));

    // Création de l'enseignant avec mot de passe hashé
    $enseignant = new Users([
        'nom' => $request->input('nom', null),
        'prenom' => $request->input('prenom', null),
        'date_naiss' => $request->input('date_naiss', null),
        'grade' => $request->input('grade', null),
        'diplome' => $request->input('diplome', null),
        'annee_rec' => $request->input('annee_rec', null),
        'domaine_exp' => $request->input('domaine_exp', null),
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
    public function edit($id)
    {
        $enseignant = User::findOrFail($id); // Trouver l'enseignant par son ID

        return view('enseignantcrud.edit', compact('enseignant'));
    }

    /**
     * Met à jour les informations de l'enseignant dans la base de données.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'date',
            'grade' => 'required|string|max:255',
            'diplome' => 'required|string|max:255',
            'annee_rec' => 'required|integer',
            'domaine_exp' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            // 'password' => 'nullable|string|min:8',
        ]);
    
        // Mettre à jour les informations de l'enseignant
        $enseignant = User::findOrFail($id);
        $enseignant->nom = $request->input('nom');
        $enseignant->prenom = $request->input('prenom');
        $enseignant->date_naiss = $request->input('date_naiss');
        $enseignant->grade = $request->input('grade');
        $enseignant->diplome = $request->input('diplome');
        $enseignant->annee_rec = $request->input('annee_rec');
        $enseignant->domaine_exp = $request->input('domaine_exp');
        // $enseignant->email = $request->input('email');
    
        // Vérifier si un nouveau mot de passe est fourni et le mettre à jour s'il y a lieu
        // if ($request->filled('password')) {
        //     $enseignant->password = bcrypt($request->input('password'));
        // }
    
        $enseignant->save();
    
        return redirect()->route('enseignantP.edit', $enseignant->id)->with('success', 'Profil mis à jour avec succès !');
    
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
