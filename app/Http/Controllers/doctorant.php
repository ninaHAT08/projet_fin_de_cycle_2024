<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
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
            'date_naiss' => 'required|date',
            'type_these' => 'required|string|max:255',
            'annee_ins' => 'required|integer',
        
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
        return redirect('doctorant')->with('flash_message', 'doctorant deleted!');  
   
    }
}
