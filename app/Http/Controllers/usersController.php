<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        // Vous pouvez implémenter cette méthode selon vos besoins
    }

    /**
     * Affiche le formulaire de création de la ressource.
     */
    public function create()
    {
        return view('etudiant.create');
    }

    /**
     * Stocke une ressource nouvellement créée dans le stockage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'nullable|date',
            'specialite' => 'nullable|string|max:255',
            'usertype' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'matricule' => [
                'nullable',
                'string',
                'min:12',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('usertype', $request->input('usertype', 'etudiant'));
                }),
            ],
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        User::create(array_merge($validatedData, [
            'password' => $hashedPassword,
            'usertype' => $request->input('usertype', 'etudiant'),
        ]));

        return redirect('etudiant')->with('flash_message', 'Étudiant ajouté avec succès!');
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(string $id)
    {
        // Vous pouvez implémenter cette méthode selon vos besoins
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     */
    public function edit(string $id)
    {
        $etudiant = User::findOrFail($id);
        return view('etudiant.edit', compact('etudiant'));
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naiss' => 'nullable|date',
            'specialite' => 'nullable|string|max:255',
            'matricule' => [
                'nullable',
                'string',
                'min:12',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $etudiant = User::findOrFail($id);
        $etudiant->update($validatedData);

        return redirect()->route('etudiant.edit', $etudiant->id)->with('flash_message', 'Profil mis à jour avec succès!');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('etudiant')->with('flash_message', 'Étudiant supprimé avec succès!');
    }
}
