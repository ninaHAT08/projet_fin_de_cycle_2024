
<x-app-layout >
<div class="bg-white">
@extends('layout')
  <h1 style="font-size: 50px; color: black; text-align: center;">Gestion Administrative </h1>
  
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 35px;">Gestion des etudiants </h5>
        <p class="card-text">Consulter la liste des etudiants a fin d'ajoute ou de supprime</p>
        <a href="{{ route('etudiant.index') }}"  class="btn btn-primary">etudiant</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 35px;">Gestion des enseignants</h5>
        <p class="card-text">Consulter la liste des enseignants a fin d'ajoute ou de supprime.</p>
        <a href="{{ route('enseignantt.index') }}" class="btn btn-primary">enseignants</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 35px;">Gestion des Sujets</h5>
        <p class="card-text">Consulter la liste des Sujets a fin de modifier ou de supprime.</p>
        <a href="{{ url('adminsujet') }}" class="btn btn-primary">Sujets</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 35px;">Gestion des Sujets Externe</h5>
        <p class="card-text">Consulter la liste des Sujets a fin de modifier ou de supprime.</p>
        <a href="{{ url('adminsujetexterne') }}" class="btn btn-primary">Sujets Externe</a>
      </div>
    </div>
  </div>
</div>
</div>
</x-app-layout>
