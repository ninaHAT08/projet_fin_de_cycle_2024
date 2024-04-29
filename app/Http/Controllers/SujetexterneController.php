<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\sujetexterne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SujetexterneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $sujets = sujetexterne::latest()->paginate(10);
        foreach ($sujets as $sujet) {
            $sujet->user = User::find($sujet->iduser);
        }
    return view('sujetexterne.index', compact('sujets'));
     
    }
    public function indexadmin()
    { 
        $sujets = sujetexterne::latest()->paginate(10);
        foreach ($sujets as $sujet) {
            $sujet->user = User::find($sujet->iduser);
        }
    return view('gestionadmin.sujetexterne', compact('sujets'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sujetexterne.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'mot_clé' => 'required|string',
            'specialite'  => 'required|max:255',
            'nom_entreprise'  => 'required|string',
        ]);
    
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();
    
        // Créer un nouveau sujet associé à l'utilisateur
        $sujets = new sujetexterne();
        $sujets->titre = $validatedData['titre'];
        $sujets->description = $validatedData['description'];
        $sujets->mot_clé = $validatedData['mot_clé'];
        $sujets->specialite = $validatedData['specialite'];
        $sujets->nom_entreprise = $validatedData['nom_entreprise'];
        $sujets->iduser = $user->id;
        $sujets->save();
       // return redirect()->route('sujetss.show', $sujets-> idsujete);
        return redirect()->route('sujetss.index', $sujets-> idsujete);
    }

    /**
     * Display the specified resource.
     */
    public function show($idsujete)
    {
        $sujets = sujetexterne::findOrFail($idsujete);
        return view('sujetexterne.show')->with('sujets', $sujets);
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
    public function destroy($idsujete)
    { 
        sujetexterne::destroy($idsujete);
   
        return redirect('sujetss')->with('flash_message', 'Sujet supprimé !');
    
      
    }
}
