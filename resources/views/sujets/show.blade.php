<x-app-layout>
@extends('layout')
<div class="card" style="margin:20px;">
  <div class="card-header  bg-primary">Sujet</div>
  <div class="card-body">
  <div class="card-body">
            <h5 class="card-title"><strong>Titre de sujet:</strong> {{ $sujet->titre }}</h5>
            <p class="card-text"><strong>Description de sujet :</strong> {{ $sujet->description }}</p>
            <p class="card-text"><strong>Mot clé de sujet:</strong> {{ $sujet->mot_cle }}</p>
            <p class="card-text"><strong>Spécialité concernée de sujet:</strong> {{ $sujet->specialite }}</p>
            <p class="card-text"><strong>Année Universitaire:</strong> {{ $sujet->anneeUniv }}</p>
            <p class="card-text"><strong>Type de sujet:</strong> {{ $sujet->typeSujet }}</p>
            @if($sujet->nomEntreprise)
                <p class="card-text"><strong>Nom de l'entreprise:</strong> {{ $sujet->nomEntreprise }}</p>
            @endif
            @if($sujet->maitre_du_stage)
                <p class="card-text">Maître du stage: {{ $sujet->maitre_du_stage }}</p>
            @endif
            <p class="card-text">Enseignant: {{ \App\Models\User::find($sujet->iduser1)->nom }} {{ \App\Models\User::find($sujet->iduser1)->prenom }}</p>
            @if($sujet->iduser2)
                <p class="card-text">Co-encadrant: {{ \App\Models\User::find($sujet->iduser2)->nom }} {{ \App\Models\User::find($sujet->iduser2)->prenom }}</p>
            @endif

            <div class="actions">

            @if(auth()->user()->id === $sujet->iduser1)
                <a href="{{ route('sujets.edit', $sujet->idSujet) }}" title="Modifier Sujet"><button class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> modifier</button></a>
            @endif
            @can('delete', $sujet)
                <form method="POST" action="{{ route('sujets.destroy', $sujet->idSujet) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce sujet ?');">
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
