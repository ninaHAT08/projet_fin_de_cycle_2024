<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header "><h3>Sujet externes</h3></div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-title"><strong>Titre de sujet:</strong> {{ $sujets -> titre }}</p>
        <p class="card-text"><strong>Description de sujet :</strong> {{ $sujets-> description }}</p>
        <p class="card-text"><strong>Mot_clé de sujet:</strong> {{ $sujets -> mot_cle }}</p>
        <p class="card-text"><strong>Specialite concerne de sujet:</strong> {{ $sujets -> specialite }}</p>
        <p class="card-text"><strong>Année universitaire:</strong> {{ $sujets -> anneeUniv }}</p>
        <p class="card-text"><strong>Type de sujet:</strong> {{ $sujets -> typeSujet }}</p>
        <p class="card-text"><strong>Nom de l'entreprise:</strong> {{ $sujets -> nomEntreprise }}</p>
        <p class="card-text"><strong>Maitre du stage :</strong> {{ $sujets -> maitre_du_stage }}</p>

        <a href="{{ url('sujetss') }}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">annuler</button></a>
   
      </th>
    </div>
    </hr>
  </div>
</div>
</x-app-layout>
