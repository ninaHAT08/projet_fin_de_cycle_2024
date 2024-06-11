<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etudiant;
use App\Models\Sujet;
use App\Models\User;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
class etudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   // $etudiant = etudiant::all();
   // return view('etudiant.index')->with('etudiant',  $etudiant);
    $etudiant = users::where('usertype', 'etudiant')->get();
    return view('etudiant.index')->with('etudiant', $etudiant);
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
    {     //$input = $request->all();
        //etudiant::create($input);
        //return redirect('etudiant')->with('flash_message', 'Student Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $etudiant = users::find($id);
        return view('etudiant.show')->with('etudiant', $etudiant);
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
  
  
    public function search() {
        $q = request()->input('q');
    
        $query = users::query();
    
        // Ajouter la condition de recherche par type d'utilisateur (uniquement les étudiants)
        $query->where('usertype', 'etudiant');
    
        // Ajouter les conditions de recherche par nom, prénom et spécialité
        $query->where(function ($query) use ($q) {
            $query->where('nom', 'like', '%' . $q . '%')
                  ->orWhere('specialite', 'like', '%' . $q . '%') 
             
                  ->orWhere('matricule', 'like', '%' . $q . '%')
                  ->orWhere('email', 'like', '%' . $q . '%')
                  ->orWhere('prenom', 'like', '%' . $q . '%');
        });
    
        $etudiant = $query->paginate(6);
    
        return view('etudiant.index')->with('etudiant', $etudiant);
    }
   
   
   
   
    public function voirSujetsChoisis()
    {
        $etudiantId = Auth::id();
        $sujets = Sujet::where('iduser1', $etudiantId)->with('choixSujets.enseignant')->get();
        return view('etudiant.sujets', compact('sujets'));
    }
}
