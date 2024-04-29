<x-app-layout>
@extends('layout')
<h1 style="font-size: 30px;  text-align: center;font-weight: bold;">Sélectionnez et ajoutez des sujets à votre liste de veoux </h1>

    
     <div class="row" style="margin:20px;">
            <div class="col-12">
            <a href="{{route('fiche.ajouter')}}" class="nav-link"><button type="button" class="btn btn-info">Consulter ma fiche de veoux</button></a> 
                <div class="card">
                    <div class="card-header">
                        <h2>La liste des Sujets</h2>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                       {{ session('success') }}
                     </div>
                    @endif

                  @if (session('error'))
                   <div class="alert alert-danger">
                        {{ session('error') }}
                      </div>
                       @endif
                       <div style="margin-left: 1050px;">
     @include('partials.search')
     </div>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    
                                        <th>Titre</th>   
                                        <th>Description</th>
                                        <th>Mot_clé</th>
                                        <th>Specialite</th>
                                        <th>L'encadrant</th>
                                        <th>Option</th>

                                  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $sujets as $sujet)
                                <td>{{ $sujet -> titre}}</td>
                                <td>{{ $sujet -> description}}</td>  
                                <td>{{ $sujet -> mot_clé}}</td>
                               <td>{{ $sujet -> specialite}}</td>
                               <td>  @if ($sujet->user){{ $sujet->user->nom }} {{ $sujet->user->prenom }}  @endif</td>
                               <td>
                               <form action="{{ route('fiche.ajouter') }}" method="POST">
                                  @csrf
                                    <input type="hidden" name="idSujet" value="{{ $sujet -> idSujet}}">
                                     <button type="submit" class="btn btn-dark">Ajouter</button>
                                 </form></td>
                                  </tr> 
                                @endforeach 
                                </tbody>
                            </table>
                            
                        </div>

{{ $sujets-> links()}}
    
 </div>
 

                    </div>
                </div>
            </div>
        </div>
  
      

</x-app-layout>
