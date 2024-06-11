<x-app-layout>
@extends('layout')
  <div >
<div class="card" style="margin:90px ;" >
  <div class="card-header " ><h1>Profil</h1></div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-title"><strong>Nom:</strong> {{ $enseignant->nom }}</p>
        <p class="card-text"><strong>Prenom :</strong> {{ $enseignant->prenom }}</p>
        <p class="card-text"><strong>Type d'utilisateur :</strong> {{ $enseignant->usertype }}</p>
        <p class="card-text"><strong>Domaine d'expertise: </strong>{{ $enseignant->domaine_exp }}</p>
        <p class="card-text"><strong>Grade: </strong>{{ $enseignant->grade }}</p>
        <p class="card-text"><strong>Diplome:</strong> {{ $enseignant->diplome }}</p>
        <p class="card-text"><strong>Année recretement</strong> {{ $enseignant->annee_rec }}</p>
        <p class="card-text"><strong>Domaine expertise</strong> {{ $enseignant->domaine_exp }}</p>
        <p class="card-text"><strong>Email :</strong> {{ $enseignant->email }}</p>
        <p class="card-text"><strong>Mot de passe :</strong> {{ $enseignant->password }}</p>

  </div>
    </hr>
    <a href="{{ route('enseignantt.index') }}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">annuler</button></a>  
  </div>
</div>
</div>
</x-app-layout>