<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class doctorant extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorants = users::where('usertype', 'doctorant')->get();
        return view('doctorant.index', compact('doctorants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctorant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'nullable|date',
            'type_these' => 'nullable|string|max:255',
            'annee_ins' => 'nullable|integer',
            'diplome_doctorant' => 'nullable|string|in:Master,Ingéniorat',
            'usertype' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Hash du mot de passe
        $hashedPassword = Hash::make($request->input('password'));
    
        // Création de l'enseignant avec mot de passe hashé
        $doctorants = new Users([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date_naiss' => $request->input('date_naiss'),
            'type_these' => $request->input('type_these'),
           
            'annee_ins' => $request->input('annee_ins'),
        
          'diplome_doctorant' => $request->input('diplome_doctorant'),
          'email' => $request->input('email'),
            'password' => $hashedPassword,
            'usertype' => 'doctorant', // Assurez-vous d'ajouter le type d'utilisateur
            // Ajoutez d'autres champs du formulaire au besoin
        ]);
    
        // Enregistrement de l'enseignant dans la base de données
        $doctorants->save();
    
        // Redirection avec un message de réussite
        return redirect('doctorant')->with('flash_message', 'doctorant ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $doctorant = User::findOrFail($id);
    return view('doctorant.edit', compact('doctorant'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'required|date',
            'type_these' => 'required|string|max:255',
            'annee_ins' => 'required|integer',
            'diplome_doctorant' => 'required|string|in:Master,Ingéniorat',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            // Utilisation de 'unique' avec une exception pour l'email actuel
        ]);
    
        // Récupérer le doctorant à mettre à jour
        $doctorant = User::findOrFail($id);
    
        // Mettre à jour les champs du doctorant
        $doctorant->nom = $request->input('nom');
        $doctorant->prenom = $request->input('prenom');
        $doctorant->date_naiss = $request->input('date_naiss');
        $doctorant->type_these = $request->input('type_these');
        $doctorant->annee_ins = $request->input('annee_ins');
        $doctorant->diplome_doctorant = $request->input('diplome_doctorant');
        $doctorant->email = $request->input('email');
    
        // Sauvegarder les modifications
        $doctorant->save();
    
        // Redirection avec un message de succès
        return redirect()->route('doctorant.edit', ['id' => $doctorant->id])->with('flash_message', 'Profil du doctorant mis à jour avec succès!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        users::destroy($id);
        return redirect('doctorant')->with('flash_message', 'doctorant deleted!');  
   
    }
    public function dashboard()
    {
        // Logique pour afficher le tableau de bord des doctorants
        return view('doctorant');
    }


}
