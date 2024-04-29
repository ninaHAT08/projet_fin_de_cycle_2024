<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header">Sujet</div>
  <div class="card-body">
        <div class="card-body">
  
        <h5 class="card-title">Titre de sujet: {{ $sujets -> titre }}</h5>
        
        <p class="card-text">Description de sujet : {{ $sujets-> description }}</p>
        <p class="card-text">Mot_clé de sujet: {{ $sujets -> mot_clé }}</p>
        <p class="card-text">Specialite concerne de sujet: {{ $sujets -> specialite }}</p>
      
    </div>
    </hr>
  </div>
</div>

</x-app-layout>
