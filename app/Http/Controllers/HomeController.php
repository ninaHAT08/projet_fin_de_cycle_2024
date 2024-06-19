<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function indexens()
    {
        return view('enseignant');
    }
    public function indexetu()
    {
        return view('etudiant.index');
    }
   
    public function dashboard()
    {
        // Logique pour afficher le tableau de bord des doctorants
        return view('doctorant');
    }
}
