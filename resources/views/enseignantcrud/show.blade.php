@extends('enseignantcrud.layout')
@section('content')
  <div >
<div class="card" style="margin:90px ;" >
  <div class="card-header" >Profil</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Nom: {{ $enseignant->nom }}</h5>
        <p class="card-text">Prenom : {{ $enseignant->prenom }}</p>
        <p class="card-text">Type d'utilisateur : {{ $enseignant->usertype }}</p>
        <p class="card-text">Domaine d'expertise: {{ $enseignant->specialite }}</p>
        <p class="card-text">Email : {{ $enseignant->email }}</p>
        <p class="card-text">Mot de passe : {{ $enseignant->password }}</p>

  </div>
    </hr>
    <a href="{{url('enseignantt')}}" class="nav-link btn-retour"><button type="button" class="btn btn-dark">Retour</button></a>  
  </div>
</div>
</div>