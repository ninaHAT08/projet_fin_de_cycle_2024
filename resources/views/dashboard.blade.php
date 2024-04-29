<x-app-layout>
@extends('layout')
<h1 style="font-size: 30px; text-align: center; font-weight: bold;">Departement Informatique  </h1>

<div class="row" style="margin-top: 30px;">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title"  style="font-size: 20px; font-weight: bold;">Liste des sujets </h5>
    <p class="card-text">Consultez la liste des sujets  proposés par les enseignant a fin de faire votre choix et remplir votre fiche de veoux.</p>
     <a href="{{url('etudiantsujet')}}" class="btn btn-primary">sujets</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 20px; font-weight: bold;">Liste des sujets externe</h5>
        <p class="card-text">Consultez la liste des sujets externe proposés par les etudiants et propser vos sujets a des enseignant .</p>
        <div class="button-container">
        <a href="{{route('sujetss.create')}}" class="nav-link"><button type="button" class="btn btn-primary">Propose un sujet</button></a>  
        <a href="{{url('sujetss')}}" class="nav-link"><button type="button" class="btn btn-primary">Liste des sujet externe</button></a>   
        </div>
      </div>
    </div>
  </div>
</div>
<style>.button-container a {
    display: inline-block;
    margin-right: 10px; /* Ajoute un espace entre les boutons */
}</style>
</x-app-layout>

