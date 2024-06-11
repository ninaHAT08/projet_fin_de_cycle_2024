<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\etudiant;
use App\Models\Choix;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Validator;

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
       // Règles de validation de base
<<<<<<< HEAD
       $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'date_naiss' => 'date',
        'specialite' => 'required|string|max:255',
        'usertype' => 'required|string|max:255',
=======
    //    $rules = [
    //     'nom' => 'required|string|max:255',
    //     'prenom' => 'required|string|max:255',
    //     'date_naiss' => 'required|date',
    //     'specialite' => 'required|string|max:255',
    //     'usertype' => 'required|string|max:255',
    //     'email' => 'required|string|email|max:255|unique:users',
    //     'password' => 'required|string|min:8',
    // ];
    $rules = [
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'date_naiss' => 'nullable|date',
        'specialite' => 'nullable|string|max:255',
        'usertype' => 'nullable|string|max:255',
>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];
    // Ajouter une règle conditionnelle pour 'matricule' si 'usertype' est 'etudiant'
    if ($request->input('usertype') === 'etudiant') {
        $rules['matricule'] = [
            'nullable',
            'string',
            'min:12',
            Rule::unique('users')->where(function ($query) {
                return $query->where('usertype', 'etudiant');
            }),
        ];
    } else {
        $rules['matricule'] = [
            'nullable',
            'string',
            'min:12',
        ];
    }

    $validatedData = $request->validate($rules);

    
        // Hash du mot de passe
        $hashedPassword = Hash::make($request->input('password'));
    
        // Créer un nouvel utilisateur avec le mot de passe hashé
        // Users::create([
        //     'nom' => $request->input('nom'),
        //     'prenom' => $request->input('prenom'),
        //     'date_naiss' => $request->input('date_naiss'),
        //     'specialite' => $request->input('specialite'),
        //     'matricule' => $request->input('matricule'),
        //     'email' => $request->input('email'),
        //     'password' => $hashedPassword,
        //     'usertype' => 'etudiant', 
        //     // Ajoutez d'autres champs du formulaire au besoin
        // ]);
        Users::create([
            'nom' => $request->input('nom', 'n'),
            'prenom' => $request->input('prenom', 'p'),
            'date_naiss' => $request->input('date_naiss', null),
            'specialite' => $request->input('specialite', 's'),
            'matricule' => $request->input('matricule', 'm'),
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
<<<<<<< HEAD
    public function edit($id)
    {
        // Récupérer l'utilisateur par son identifiant
        $etudiant = User::findOrFail($id);
        
        // Retourner la vue avec les données de l'utilisateur
        return view('etudiant.edit', compact('etudiant'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Règles de validation
        $rules = [
=======
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    public function edit()
    {
        $user = Auth::user();
        return view('etudiant.profil', compact('user'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'required|date',
            'specialite' => 'required|string|max:255',
<<<<<<< HEAD
        ];
    
        // Ajouter une règle conditionnelle pour 'matricule' si 'usertype' est 'etudiant'
        if ($request->input('usertype') === 'etudiant') {
            $rules['matricule'] = [
                'required',
                'string',
                'min:12',
                Rule::unique('users')->ignore($id)->where(function ($query) {
                    return $query->where('usertype', 'etudiant');
                }),
            ];
        } else {
            $rules['matricule'] = [
                'nullable',
                'string',
                'min:12',
            ];
        }
    
        $validatedData = $request->validate($rules);
    
        // Récupérer l'utilisateur par son identifiant
        $user = User::findOrFail($id);
    
        // Mettre à jour les informations de l'utilisateur
        $user->update($validatedData);
    
        // Redirection avec un message de réussite
        return redirect()->route('etudiantP.edit', $user->id)->with('flash_message', 'Profil mis à jour avec succès!');
    }
    /**
     * Remove the specified resource from storage.
     */
=======
           // 'matricule' => 'required|string|max:255',
           'matricule' => 'required|string|size:12|unique:users,matricule',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profil.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->date_naiss = $request->input('date_naiss');
        $user->specialite = $request->input('specialite');
        $user->matricule = $request->input('matricule');
        $user-> save();

        return redirect()->route('profil.edit')->with('success', 'Profil mis à jour avec succès.');
    }




>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
    public function destroy(string $id)
    {
        users::destroy($id);
        return redirect('etudiant')->with('flash_message', 'Student deleted!');  
        
    }

   
}
