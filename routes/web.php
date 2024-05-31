<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\etudiantController;
use App\Http\Controllers\enseignantController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\GestionAdminController;
use App\Http\Controllers\SujetexterneController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChoixController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AffichageController;
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
///les route securise que l'admin a le droit 
Route::middleware(['auth' , 'admin'])->group(function () {
Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth' , 'admin']);
Route::get('/enseignant', [HomeController::class, 'indexens'])->middleware(['auth','enseignant']);
Route::get('/doctorant', [HomeController::class, 'indexdoct'])->middleware(['auth','doctorant']);

/// la route pour la gestion des etudiant
Route::resource('/etudiant', 'App\Http\Controllers\etudiantController');
Route::resource('/etudiantt', 'App\Http\Controllers\usersController');
/// la route pour la gestion des enseignant
Route::resource('/enseignantt', 'App\Http\Controllers\enseignantController');
/// la route pour la gestion des doctorant
Route::resource('/doctorant', 'App\Http\Controllers\doctorant');

// pour les sujet ineterne admin
Route::get('/gestionadmin/sujet', function () {return view('gestionadmin.sujet');})->name('gestionadmin.sujet');
//pour la barre de recherche
Route::get('/searchensg', [enseignantController::class, 'search'])->name('enseignant.search');
Route::get('/searchetudiant', [etudiantController::class, 'search'])->name('etudiant.search');
//l'espace sujet exterene admin
Route::get('/adminsujet', function () { return view('gestionadmin.sujet');})->name('adminsujet');
Route::get('/adminsujetexterne', function () { return view('gestionadmin.sujetexterne');})->name('adminsujetexterne');
////////////////////////les routes conernant les session
Route::resource('sessions', SessionController::class);
Route::get('getevents', [SessionController::class, 'getEvents'])->name('getevents');
Route::delete('sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');
Route::get('/sessions/{id}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
Route::put('/sessions/{id}', [SessionController::class, 'updatte'])->name('sessions.update');
///////// les route pour liste des sujet affecte non affecter avec aussi le nombre de sujet proposer et non proposer
Route::get('/sujets-par-enseignant', [GestionAdminController::class, 'sujetsParEnseignant'])->name('sujets-par-enseignant');
Route::get('/etudiants-avec-sujets', [GestionAdminController::class, 'etudiantsAvecSujets'])->name('etudiants-avec-sujets');
Route::get('/etudiants-sans-etat-true', [GestionAdminController::class, 'etudiantsAvecEtatNullOuFalse'])->name('etudiants-sans-etat-true');
 });
///les route securise que l'enseignant a le droit d'acceder
Route::middleware(['auth' , 'enseignant'])->group(function () {
    //route important apre l'authentification
Route::resource('/enseignant', 'App\Http\Controllers\SujetController');
//route pour modifier sujet mm s'il existe une 
Route::resource('/sujets', 'App\Http\Controllers\SujetController');
// toute les route concernant les sujet interne 
//1- pour affiche les sujet interne dans l'espace enseignant
Route::get('/sujetsindex', [App\Http\Controllers\SujetController::class, 'index'])->name('sujets.index');
//2-pour affiche les sujet nterne dans l'espace admin
Route::get('/adminsujet', [App\Http\Controllers\SujetController::class, 'gestionsujet'])->name('adminsujet');
//3- pour affiche les sujet inetrene apre valider paer l'admin dans l'espace etudiant 
Route::get('/espaceetudiant', [App\Http\Controllers\EspaceEtudiantController::class, 'index'])->name('espaceetudiant');
////// un enseignant peut voir la liste des sujet publier par l'admin
Route::get('/enseignantpublier', [App\Http\Controllers\EspaceEtudiantController::class, 'indexpublier'])->name('enseignantpublier');
//5- la liste de chaque enseigant 
Route::get('/maliste', [App\Http\Controllers\SujetController::class, 'maListe'])->name('maliste');
//6- l'admin qui valide le sujet de l'enseignant
Route::post('/sujets/valider/{idSujet}', [App\Http\Controllers\SujetController::class, 'valider'])->name('sujets.valider');
//7- creation de sujet par l'enseignant
Route::get('/sujets/create', [App\Http\Controllers\SujetController::class, 'create'])->name('sujets.create');
Route::post('/sujets', [App\Http\Controllers\SujetController::class, 'store'])->name('sujets.store');
Route::get('/sujets/{idSujet}/edit', [App\Http\Controllers\SujetController::class, 'edit'])->name('sujets.edite');
Route::put('/sujets/{id}', [App\Http\Controllers\SujetController::class, 'update'])->name('sujets.update');
Route::delete('/sujets/{idSujet}', [App\Http\Controllers\SujetController::class, 'destroy'])->name('sujets.destroy');
Route::get('/sujets/{id}/show', [App\Http\Controllers\SujetController::class, 'show'])->name('sujets.show');
//afecter sujet 
Route::post('/sujets/affecter/{id}', [ChoixController::class, 'affecter'])->name('sujets.affecter');
//liste choix des etudiant
   Route::get('/affectation', [App\Http\Controllers\ChoixController::class, 'affectation'])->name('affectation');
});
//afficher laffectation dans etudiant
Route::middleware('auth')->get('/affichage-affectation', [AffichageController::class, 'showAffectationNotification'])->name('affichage.affectation');  

require __DIR__.'/auth.php';
// pour la gestion des etudiant enseignant par l'admin ca rentre dans l'authentification
Route::resource('/etudiantuser', 'App\Http\Controllers\usersController');
Route::resource('/enseignantuser', 'App\Http\Controllers\usersenseignantController');
//pour affiche les sujet propose par l'enseignant et valider par l'admin au etudiant
Route::get('/espaceetudiant', function () { return view('espaceetudiant');})->name('espaceetudiant');
Route::get('/espaceetudiant', [App\Http\Controllers\EspaceEtudiantController::class, 'index'])->name('espaceetudiant');


/// toute les route concernant la creation la suppression la modification des sujet externe
Route::post('/sujetss/valider/{idSujet}', [App\Http\Controllers\SujetexterneController::class, 'valider'])->name('sujetss.valider');
Route::get('/adminsujetexterne', [App\Http\Controllers\SujetexterneController::class, 'indexadmin'])->name('adminsujetexterne');
Route::get('/enseaignantsujetexterne', [App\Http\Controllers\SujetexterneController::class, 'indexenseignant'])->name('enseaignantsujetexterne');
Route::get('/mmaliste', [App\Http\Controllers\SujetexterneController::class, 'mmaListe'])->name('mmaliste');
Route::get('/sujetss/create', [SujetexterneController::class, 'create'])->name('sujetss.create');
Route::post('/sujetss', [SujetexterneController::class, 'store'])->name('sujetss.store');
Route::delete('/sujetss/{idSujet}', [App\Http\Controllers\SujetexterneController::class, 'destroy'])->name('sujetss.destroy');
Route::get('/sujetss', [SujetexterneController::class, 'index'])->name('sujetss');
Route::resource('/sujetss', 'App\Http\Controllers\SujetexterneController');
//pour le barre recherche
Route::get('/search', [App\Http\Controllers\SujetController::class, 'search'])->name('sujets.search');

//pour le choix 

Route::post('/choix/ajouter', [App\Http\Controllers\ChoixController::class, 'store'])->name('choix.ajouter');
Route::resource('/choix', 'App\Http\Controllers\ChoixController');
Route::get('/choix/ajouter', [App\Http\Controllers\ChoixController::class, 'show'])->name('choix.ajouter');
Route::delete('/choix/{id}', [App\Http\Controllers\ChoixController::class, 'destroy'])->name('choix.destroy');
Route::post('/choix/updateBinome', [App\Http\Controllers\ChoixController::class, 'updateBinome'])->name('choix.updateBinome');
Route::get('/affecter', [App\Http\Controllers\ChoixController::class, 'afficherSujetsAffectes'])->name('affecter');
//la route d'envoie la fiche et l'affectation
Route::post('/choix/envoyer', [App\Http\Controllers\ChoixController::class, 'envoyer'] )->name('choix.envoyer');
Route::get('/affectation', [App\Http\Controllers\ChoixController::class, 'affectation'])->name('affectation');

// //les routes pour les actions CRUD (Create, Read, Update, Delete) pour session crer par moi


