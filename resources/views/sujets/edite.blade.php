<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header">Mettre a jour le Sujet</div>
  <div class="card-body">
       <h1>{{ $sujets -> titre }}</h1>
   

     <form action="{{ route('sujets.update', $sujets->idSujet) }}" method="post">
    @csrf 
    @method('PATCH') 
        <label>Titre du sujet</label></br>
        <input type="text" name="titre" value="{{ $sujets -> titre }}" id="titre" class="form-control @error('title') is-invalid @enderror" ></br>
        <label>Description du sujet</label></br>
        <textarea type="text" name="description" id="description" class="form-control">{{ $sujets -> description }}</textarea></br>
        <label>Mot_clé de sujet</label></br>
        <input type="text"  name="mot_clé" value="{{ $sujets -> mot_clé }}" id="mot_clé" class="form-control @error('mot_clé') is-invalid @enderror"></br>
        <label>specialite concerne du sujet</label></br>
        <input type="text" name="specialite" value="{{ $sujets -> specialite }}" id="specialite" class="form-control @error('specialite') is-invalid @enderror"></br>
       
       
        <div style="text-align: center;">
        <input type="submit" value="Enregistre" class="btn btn-success"></br>
        </div>
      
    </form>
    
  </div>
</div>
</x-app-layout>