<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\sujets;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SujetsController extends Controller
{
   //public function __construct(){$this->middleware('auth');}
    public function index()
    {
       $sujets = sujets::latest()->paginate(10);
        //$sujets = sujets::with('user')->latest()->paginate(10);

        foreach ($sujets as $sujet) {
           $sujet->user = User::find($sujet->iduser);
           }
        return view('enseignant', compact('sujets'));
    }
    public function etudiantsujet()
    {
        $sujets = sujets::latest()->paginate(10);
        
        foreach ($sujets as $sujet) {
            $sujet->user = User::find($sujet->iduser);
    }

        return view('etudiantsujet', compact('sujets'));
    }
    public function adminsujet()
    {
        $sujets = sujets::latest()->paginate(10);
        
        foreach ($sujets as $sujet) {
            $sujet->user = User::find($sujet->iduser);
    }

        return view('admin', compact('sujets'));
    }
    public function gestionsujet()
    {
        $sujets = sujets::latest()->paginate(10);
        
        foreach ($sujets as $sujet) {
            $sujet->user = User::find($sujet->iduser);
    }

        return view('gestionadmin.sujet', compact('sujets'));
    }

    public function create()
    {
       return view('sujets.create');
    }

    public function store(Request $request)
    {
               $validatedData = $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'required|string',
                'mot_clé' => 'required|string',
                'specialite'  => 'required|max:255',
            ]);
        
            // Récupérer l'utilisateur actuellement authentifié
            $user = Auth::user();
        
            // Créer un nouveau sujet associé à l'utilisateur
            $sujets = new sujets();
            $sujets->titre = $validatedData['titre'];
            $sujets->description = $validatedData['description'];
            $sujets->mot_clé = $validatedData['mot_clé'];
            $sujets->specialite = $validatedData['specialite'];
            $sujets->iduser = $user->id;
            $sujets->save();
            return redirect()->route('sujets.show', $sujets-> idSujet);
    }

    public function show($idSujet)
    {     
        $sujets = sujets::findOrFail($idSujet);
      
      //  $sujets->load('user');
        return view('sujets.show')->with('sujets', $sujets);
    }
    public function showadmin($idSujet)
    {     
        $sujets = sujets::findOrFail($idSujet);
        return view('gestionadmin.show')->with('sujets', $sujets);
    }
  
   
    public function edit($idSujet)
    {
         // Récupérer le sujet à éditer
         $sujets = sujets::findOrFail($idSujet);

    // Passer le sujet à la vue du formulaire d'édition
    return view('sujets.edite', compact('sujets'));
    }

    
    public function update(Request $request, $idSujet)
{
    $validatedData = $request->validate([
        'titre' => 'required|max:255',
        'description' => 'required',
      'mot_clé' => 'required|max:255',
         'specialite'  => 'required|max:255',
    ]);

    // Récupérer le sujet à mettre à jour
    $sujets = sujets::findOrFail($idSujet);

    // Mettre à jour les données du sujet
    $sujets->titre = $validatedData['titre'];
    $sujets->description = $validatedData['description'];
    $sujets->mot_clé = $validatedData['mot_clé'];
    $sujets->specialite = $validatedData['specialite'];
    $sujets->save();
   
    return redirect()->route('sujets.show', $sujets->idSujet);
   
}

   
   public function destroy($idSujet)
{
    sujets::destroy($idSujet);
    return redirect('enseignant')->with('flash_message', 'Sujet supprimé !');
}



public function search(){
              $q = request()->input('q');
              $sujets =  sujets::where('titre', 'like', '%' . $q . '%')
              ->orWhere('specialite', 'like', '%' . $q . '%')
                 ->orWhere('description', 'like', '%' . $q . '%')
                             ->paginate(6);
                           //  $sujets->each(function ($sujet) use ($user) {
                               // $sujet->iduser = $user->id; });
return view ('sujets.search')-> with('sujets', $sujets);
}




}   
