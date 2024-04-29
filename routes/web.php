<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SujetsController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\etudiantController;
use App\Http\Controllers\enseignantController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\SujetexterneController;
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
///les route securise que la admin ale droit d'accede
Route::middleware(['auth' , 'admin'])->group(function () {
Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth' , 'admin']);
Route::get('/enseignant', [HomeController::class, 'indexens'])->middleware(['auth','enseignant']);
Route::resource('/etudiant', 'App\Http\Controllers\etudiantController');
Route::resource('/etudiantt', 'App\Http\Controllers\usersController');

Route::resource('/enseignantt', 'App\Http\Controllers\enseignantController');
Route::get('/admin', [SujetsController::class, 'adminsujet'])->name('admin.adminsujet');
Route::get('/searchensg', [enseignantController::class, 'search'])->name('enseignant.search');
Route::get('/searchetudiant', [etudiantController::class, 'search'])->name('etudiant.search');
Route::get('/adminsujet', function () { return view('gestionadmin.sujet');})->name('adminsujet');
Route::get('/adminsujetexterne', function () { return view('gestionadmin.sujetexterne');})->name('adminsujetexterne');
Route::get('/adminsujet', [SujetsController::class, 'gestionsujet'])->name('adminsujet');
Route::get('/sujetsadmin/{id}/show', [SujetsController::class, 'showadmin'])->name('gestionadmin.show');
Route::get('/adminsujetexterne', [SujetexterneController::class, 'indexadmin'])->name('adminsujetexterne');

});
///les route securise que l'enseignant a le droit d'acceder
Route::middleware(['auth' , 'enseignant'])->group(function () {
Route::resource('/enseignant', 'App\Http\Controllers\SujetsController');
Route::resource('/sujets', 'App\Http\Controllers\SujetsController');
Route::get('/sujets/{id}/edit', [SujetsController::class, 'edit'])->name('sujets.edite');
Route::get('/sujets/{id}/show', [SujetsController::class, 'show'])->name('sujets.show');
Route::patch('/sujets/{id}/update', [SujetsController::class, 'update'])->name('sujets.update');
   });
require __DIR__.'/auth.php';
//Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth' , 'admin']);
//Route::get('/enseignant', [HomeController::class, 'indexens'])->middleware(['auth','enseignant']);
//Route::get('/etudiant', [HomeController::class, 'indexetu'])->middleware(['auth', 'admin']);
//Route::resource('/etudiant', 'App\Http\Controllers\etudiantController');
Route::resource('/etudiantuser', 'App\Http\Controllers\usersController');
//Route::resource('/enseignantt', 'App\Http\Controllers\enseignantController');
Route::resource('/enseignantuser', 'App\Http\Controllers\usersenseignantController');

///pour les sujet
//Route::resource('/enseignant', 'App\Http\Controllers\SujetsController');
//Route::resource('/sujets', 'App\Http\Controllers\SujetsController');
//Route::get('/sujets/{id}/edit', [SujetsController::class, 'edit'])->name('sujets.edite');
//Route::get('/sujets/{id}/show', [SujetsController::class, 'show'])->name('sujets.show');
//Route::patch('/sujets/{id}/update', [SujetsController::class, 'update'])->name('sujets.update');
Route::get('/etudiantsujet', function () {
    return view('etudiantsujet');
})->name('etudiantsujet');

Route::get('/etudiantsujet', [SujetsController::class, 'etudiantsujet'])->name('etudiant.etudiantsujet');
Route::get('/sujetss', [SujetexterneController::class, 'index'])->name('sujetss');
Route::resource('/sujetss', 'App\Http\Controllers\SujetexterneController');
Route::get('/sujetss/{id}/show', [SujetexterneController::class, 'show'])->name('sujetss.show');
Route::get('/sujetss/{id}/index', [SujetexterneController::class, 'index'])->name('sujetss.index');
//Route::get('/sujetss', [SujetExterneController::class, 'destroy']);
//Route::post('/fiche/ajouter-sujet', [FicheController::class, 'ajouterSujet'])->name('ajouter_sujet');
//Route::resource('/fiche', 'App\Http\Controllers\FicheController');
//Route::post('/fiche/ajouter', [FicheController::class, 'store'])->name('fiche.ajouter');
Route::post('/fiche/ajouter', [FicheController::class, 'store'])->name('fiche.ajouter');
Route::resource('/fiche', 'App\Http\Controllers\FicheController');
Route::get('/fiche/ajouter', [FicheController::class, 'show'])->name('fiche.ajouter');
Route::get('/search', [SujetsController::class, 'search'])->name('sujet.search');



