<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\etudiant;
use App\Models\fiches;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use Illuminate\Http\Request;

class usersController extends Controller
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
        return view('etudiant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'usertype' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            // Ajoutez d'autres règles de validation au besoin
        ]);
    
        // Hash du mot de passe
        $hashedPassword = Hash::make($request->input('password'));
    
        // Créer un nouvel utilisateur avec le mot de passe hashé
        Users::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'specialite' => $request->input('specialite'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'usertype' => 'etudiant', 
            // Ajoutez d'autres champs du formulaire au besoin
        ]);
    
        // Redirection avec un message de réussite
        return redirect('etudiant')->with('flash_message', 'Étudiant ajouté avec succès!');
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
        return redirect('etudiant')->with('flash_message', 'Student deleted!');  
        
    }

   
}
