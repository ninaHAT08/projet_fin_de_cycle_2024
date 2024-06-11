<x-app-layout>
@extends('layout')
  
<div class="card" style="margin:20px;">
  <div class="card-header  bg-primary"><strong>Profile de l'etudint</strong></div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title"><strong>Nom:</strong> {{ $etudiant->nom }}</h5>
        <p class="card-text"><strong>Prenom :</strong> {{ $etudiant->prenom }}</p>
        <p class="card-text"><strong>Date Naissance :</strong> {{ $etudiant->date_naiss }}</p>
        <p class="card-text"><strong>Type d'utilisateur :</strong> {{ $etudiant->usertype }}</p>
        <p class="card-text"><strong>specialite :</strong> {{ $etudiant->specialite }}</p>
        <p class="card-text"><strong>matricule :</strong> {{ $etudiant->matricule }}</p>
        <p class="card-text"><strong>Email :</strong> {{ $etudiant->email }}</p>
        <p class="card-text"><strong>Mot de passe :</strong> {{ $etudiant->password }}</p>

  </div>
    </hr>
    <a href="{{ route('etudiant.index') }}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">annuler</button></a>  
  </div>
</div>
</x-app-layout>