<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header bg-primary">Sujets externe</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Titre de sujet: {{ $sujets -> titre }}</h5>
        <p class="card-text">Description de sujet : {{ $sujets-> description }}</p>
        <p class="card-text">L'entreprise qui a propose le sujet : {{ $sujets-> nom_entreprise }}</p>
        <p class="card-text">Mot_clé de sujet: {{ $sujets -> mot_clé }}</p>
        <p class="card-text">Specialite concerne de sujet: {{ $sujets -> specialite }}</p>
        <td>l'etudiant: {{ \App\Models\User::find($sujets->iduser)->nom }} {{ \App\Models\User::find($sujets->iduser)->prenom }} </td></br>
        @can('delete', $sujets)
          <form method="POST" action="{{ route('sujetss.destroy', $sujets->idsujete) }}" accept-charset="UTF-8" style="display:inline">
        @method('DELETE') 
          @csrf
           <button type="submit" class="btn btn-danger btn-sm">
           <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
           </button>
        </form>
        @endcan
      </th>
    </div>
    </hr>
  </div>
</div>
</x-app-layout>
