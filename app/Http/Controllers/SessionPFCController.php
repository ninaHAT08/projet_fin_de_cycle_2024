<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionPFCController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'nbr_session' => [
                'required',
                'integer',
                Rule::in([1, 2, 3, 4, 5]), // Limiter le nombre de sessions à 5
            ],
            'user_id' => 'required|exists:users,id',
        ]);

        // Création d'une nouvelle session
        SessionPFC::create($request->all());

        return redirect()->route('sessions.index')
            ->with('success', 'Session PFC ajoutée avec succès.');
    }

    public function update(Request $request, SessionPFC $session)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'nbr_session' => [
                'required',
                'integer',
                Rule::in([1, 2, 3, 4, 5]), // Limiter le nombre de sessions à 5
            ],
            'user_id' => 'required|exists:users,id',
        ]);
        // Mise à jour de la session
        $session->update($request->all());

        return redirect()->route('sessions.index')
            ->with('success', 'Session PFC mise à jour avec succès.');
    }

    public function destroy(SessionPFC $session)
    {
        // Suppression de la session
        $session->delete();

        return redirect()->route('sessions.index')
            ->with('success', 'Session PFC supprimée avec succès.');
    }
}
