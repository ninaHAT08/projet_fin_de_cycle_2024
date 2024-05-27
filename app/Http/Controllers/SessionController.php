<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth; 
class SessionController extends Controller
{
      // Afficher la liste des sessions
      public function index()
      {
          $sessions = Session::all();
          return view('sessions.index', compact('sessions'));
      }
  
      // Afficher le formulaire de création d'une nouvelle session
      public function create()
      {
          // Vérifier s'il y a déjà 5 sessions
          if (Session::count() >= 5) {
              return redirect()->route('sessions.index')->with('error', 'Vous ne pouvez pas créer plus de 5 sessions.');
          }
  
          return view('sessions.create');
      }
  
      // Enregistrer une nouvelle session
      public function store(Request $request)
      {
          // Validation des données du formulaire
          $request->validate([
            'intitule_session' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'annee_univ' => 'required|string|max:255'
        ]);

      

        try {
            // Vérifier s'il y a déjà 5 sessions
            if (Session::count() >= 5) {
                return redirect()->route('sessions.index')->with('error', 'Vous ne pouvez pas créer plus de 5 sessions.');
            }

            $user = Auth::user(); // Récupère l'utilisateur actuellement authentifié

            // Vérifiez si l'utilisateur est authentifié
            if (!$user) {
                return redirect()->route('sessions.create')->with('error', 'Vous devez être authentifié pour créer une session.');
            }

            // Créer la nouvelle session avec les données du formulaire et l'utilisateur authentifié
            Session::create([
                'intitule_session' => $request->intitule_session,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'annee_univ' => $request->annee_univ,
                'iduser' => $user->id // Associe l'utilisateur authentifié
            ]);

            return redirect()->route('sessions.index')->with('success', 'Session créée avec succès.');
        } catch (QueryException $e) {
            return redirect()->route('sessions.create')->with('error', 'Erreur de base de données : ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('sessions.create')->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


    
    public function edit($id)
    {
        $session = Session::findOrFail($id);
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'intitule_session' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'annee_univ' => 'required',
        ]);

        $session = Session::findOrFail($id);
        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session supprimée avec succès.');
    }
   
    public function getSessionsForCalendar()
    {
      try{
        $sessions = Session::all(['intitule_session', 'date_debut', 'date_fin']);
        \Log::info('Sessions retrieved: ', $sessions->toArray()); // Ajoutez ceci pour voir les données récupérées
        $events = $sessions->map(function ($session) {
            return [
                'title' => $session->intitule_session,
                'start' => $session->date_debut,
                'end' => $session->date_fin,
            ];
        });

        return response()->json($events);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la récupération des événements.'], 500);
    }
    }

}