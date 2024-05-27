<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sujet;
use App\Models\users;
use App\Models\enseignant;
class enseignantController extends Controller
{
   
    public function index()
    {
   // $etudiant = etudiant::all();
   // return view('etudiant.index')->with('etudiant',  $etudiant);
    $enseignant = users::where('usertype', 'enseignant')->get();
    return view('enseignantcrud.index')->with('enseignant', $enseignant);
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
    public function store(Request $request)
    {     //$input = $request->all();
        //etudiant::create($input);
        //return redirect('etudiant')->with('flash_message', 'Student Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $enseignant = users::find($id);
        return view('enseignantcrud.show')->with('enseignant', $enseignant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
 // Récupérer les choix envoyés pour les sujets appartenant à l'enseignant connecté
    // public function showStudentChoices()
    // {
    //     $enseignantId = Auth::id();

    //     // Récupérer les choix envoyés pour les sujets appartenant à l'enseignant connecté
    //     $choix = Choix::whereHas('Sujet', function ($query) use ($enseignantId) {
    //         $query->where('iduser1', $enseignantId);
    //     })->where('envoyer', true)->get();

    //     return view('enseignantcrud.choix', compact('choix'));
    // }



    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
    public function search() {
        $q = request()->input('q');
    
        $query = users::query();
    
        // Ajouter la condition de recherche par type d'utilisateur (uniquement les étudiants)
        $query->where('usertype', 'enseignant');
    
        // Ajouter les conditions de recherche par nom, prénom et spécialité
        $query->where(function ($query) use ($q) {
            $query->where('nom', 'like', '%' . $q . '%')
                  ->orWhere('domaine_exp', 'like', '%' . $q . '%')
                  ->orWhere('prenom', 'like', '%' . $q . '%')
                 
                  ->orWhere('grade', 'like', '%' . $q . '%')
                  ->orWhere('diplome', 'like', '%' . $q . '%')
                  ->orWhere('annee_rec', 'like', '%' . $q . '%')
                  ->orWhere('email', 'like', '%' . $q . '%');
        });
    
        $enseignant = $query->paginate(6);
    
        return view('enseignantcrud.index')->with('enseignant', $enseignant);
    }
}
