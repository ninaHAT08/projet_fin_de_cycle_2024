<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header bg-primary">Proposer un Sujet</div>
  <div class="card-body">   
      <form action="{{ url('sujetss') }}" method="post">
        {!! csrf_field() !!}
        <label>Titre de sujet</label></br>
        <input type="text" name="titre" id="titre" class="form-control @error('title') is-invalid @enderror" ></br>
        <label>Description de sujet</label></br>
        <textarea type="text" name="description" id="description" class="form-control"></textarea></br>
        <label>Mot_clé de sujet</label></br>
        <input type="text" name="mot_clé" id="mot_clé" class="form-control @error('mot_clé') is-invalid @enderror"></br>
        <label>specialite concerne du sujet</label></br>
        <input type="text" name="specialite" id="specialite" class="form-control @error('specialite') is-invalid @enderror"></br>
        <label>Le nom de l'entreprise</label></br>
        <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control @error('nom_entreprise') is-invalid @enderror"></br>
        
        <div style="text-align: center;">
        <button type="submit" class="btn btn-primary">enregistré</button>
        <a href="{{url('dashboard')}}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a>
        </div>
    </form>
    
  </div>
</div>
</x-app-layout>