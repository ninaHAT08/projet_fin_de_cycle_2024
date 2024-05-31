<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth; 
class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        if (Session::count() >= 5) {
            return redirect()->route('sessions.index')->with('error', 'Vous ne pouvez pas créer plus de 5 sessions.');
        }

        return view('sessions.create');
    }

   // public function store(Request $request)
   // {$request->validate([
         //   'intitule_session' => 'required|string|max:255',
         //   'date_debut' => 'required|date',
         //   'date_fin' => 'required|date',
         //   'annee_univ' => 'required|integer',
         //   'iduser' => 'required|exists:users,id'
        //]);

        //sessionpfc::create($request->all());
        //return redirect()->route('sessions.index')->with('success', 'Session créée avec succès.');
   // }
  // public function store(Request $request)
   // {
        // Valider les données du formulaire
       // $request->validate([
       //     'intitule_session' => 'required|string|max:255',
        //    'date_debut' => 'required|date',
         //   'date_fin' => 'required|date|after_or_equal:date_debut',
          //  'annee_univ' => 'required|integer',
       // ]);

        // Créer une nouvelle session avec les données validées et l'ID de l'utilisateur connecté
       // $session = new SessionPfc([
         //   'intitule_session' => $request->input('intitule_session'),
         //   'date_debut' => $request->input('date_debut'),
         //   'date_fin' => $request->input('date_fin'),
          //  'annee_univ' => $request->input('annee_univ'),
           // 'iduser' => Auth::user()->id,
       //  ]);

       //  $session->save();

        // Rediriger avec un message de succès
       // return redirect()->route('sessions.index')->with('success', 'Session ajoutée avec succès.');
   // }

   // public function destroy(sessionpfc $session)
   // {
      //  $session->delete();
      //  return redirect()->route('sessions.index')->with('success', 'Session supprimée avec succès.');
    //}
    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session supprimée avec succès.');
    }
  
    public function getEvents(Request $request)
    {
        if ($request->ajax()) {
            $events = Session::select(['id', 'intitule_session as title', 'date_debut as start', 'date_fin as end'])->get();
            return response()->json($events);
        }
        return view('sessions.index');
    }




    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'intitule_session' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'annee_univ' => 'required|integer',
        ]);

        // Vérifier le chevauchement des dates
        $existingSession = Session::where(function($query) use ($request) {
            $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                  ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
                  ->orWhere(function($query) use ($request) {
                      $query->where('date_debut', '<=', $request->date_debut)
                            ->where('date_fin', '>=', $request->date_fin);
                  });
        })->exists();

        if ($existingSession) {
            return redirect()->back()->withErrors(['error' => 'Les dates de la session chevauchent une session existante.']);
        }

        // Créer une nouvelle session avec les données validées et l'ID de l'utilisateur connecté
        $session = new Session([
            'intitule_session' => $request->input('intitule_session'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'annee_univ' => $request->input('annee_univ'),
            'iduser' => Auth::user()->id,
        ]);

        $session->save();

        // Rediriger avec un message de succès
        return redirect()->route('sessions.index')->with('success', 'Session ajoutée avec succès.');
    }

    // Méthode update avec la même logique de validation
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'intitule_session' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'annee_univ' => 'required|integer',
        ]);

        // Vérifier le chevauchement des dates
        $existingSession = Session::where('id', '!=', $id)
            ->where(function($query) use ($request) {
                $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                      ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
                      ->orWhere(function($query) use ($request) {
                          $query->where('date_debut', '<=', $request->date_debut)
                                ->where('date_fin', '>=', $request->date_fin);
                      });
            })->exists();

        if ($existingSession) {
            return redirect()->back()->withErrors(['error' => 'Les dates de la session chevauchent une session existante.']);
        }

        // Trouver et mettre à jour la session existante
        $session = Session::findOrFail($id);
        $session->intitule_session = $request->input('intitule_session');
        $session->date_debut = $request->input('date_debut');
        $session->date_fin = $request->input('date_fin');
        $session->annee_univ = $request->input('annee_univ');
        $session->save();

        // Rediriger avec un message de succès
        return redirect()->route('sessions.index')->with('success', 'Session mise à jour avec succès.');
    }
    public function edit($id)
    {
        $session = Session::findOrFail($id);
        return view('sessions.edit', compact('session'));
    }

    public function updatte(Request $request, $id)
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


}