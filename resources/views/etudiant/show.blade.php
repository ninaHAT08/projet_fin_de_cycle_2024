@extends('etudiant.layout')
@section('content')
  
<div class="card" style="margin:90px;">
  <div class="card-header  bg-primary">Profil</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Nom: {{ $etudiant->nom }}</h5>
        <p class="card-text">Prenom : {{ $etudiant->prenom }}</p>
        <p class="card-text">Type d'utilisateur : {{ $etudiant->usertype }}</p>
        <p class="card-text">specialite : {{ $etudiant->specialite }}</p>
        <p class="card-text">Email : {{ $etudiant->email }}</p>
        <p class="card-text">Mot de passe : {{ $etudiant->password }}</p>

  </div>
    </hr>
    <a href="{{url('etudiant')}}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a>  
  </div>
</div>