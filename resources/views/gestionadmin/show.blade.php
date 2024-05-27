<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header  bg-primary">Sujet</div>
  <div class="card-body">
  <div class="card-body">
            <h5 class="card-title">Titre de sujet: {{ $sujet->titre }}</h5>
            <p class="card-text">Description de sujet : {{ $sujet->description }}</p>
            <p class="card-text">Mot clé de sujet: {{ $sujet->mot_cle }}</p>
            <p class="card-text">Spécialité concernée de sujet: {{ $sujet->specialite }}</p>
            <p class="card-text">Année Universitaire: {{ $sujet->anneeUniv }}</p>
            <p class="card-text">Type de sujet: {{ $sujet->typeSujet }}</p>
            @if($sujet->nomEntreprise)
                <p class="card-text">Nom de l'entreprise: {{ $sujet->nomEntreprise }}</p>
            @endif
            @if($sujet->maitre_du_stage)
                <p class="card-text">Maître du stage: {{ $sujet->maitre_du_stage }}</p>
            @endif
            <p class="card-text">Enseignant: {{ \App\Models\User::find($sujet->iduser1)->nom }} {{ \App\Models\User::find($sujet->iduser1)->prenom }}</p>
            @if($sujet->iduser2)
                <p class="card-text">Co-encadrant: {{ \App\Models\User::find($sujet->iduser2)->nom }} {{ \App\Models\User::find($sujet->iduser2)->prenom }}</p>
            @endif

            <div class="actions">

              
                @can('delete', $sujet)
                    <form method="POST" action="{{ route('sujets.destroy', $sujet->idSujet) }}" accept-charset="UTF-8" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                        </button>
                    </form>
                @endcan
            </div>
    </hr>
  </div>
</div>

</x-app-layout>
