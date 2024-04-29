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
        <td>l'enseignat: {{ \App\Models\User::find($sujets->iduser)->nom }} {{ \App\Models\User::find($sujets->iduser)->prenom }} </td></br>
        <tr>
        @if(auth()->user()->id === $sujets->iduser)
        <th > <a href="{{route ('sujets.edite', $sujets) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Modifier</button></th>
        @endif
        
        <th> @can('delete', $sujets)
          <form method="POST" action="{{ route('sujets.destroy', $sujets->idSujet) }}" accept-charset="UTF-8" style="display:inline">
        @method('DELETE') 
          @csrf
            <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
        </form>
        @endcan
      </th>

        </tr> 
                
    </div>
    </hr>
  </div>
</div>

</x-app-layout>
