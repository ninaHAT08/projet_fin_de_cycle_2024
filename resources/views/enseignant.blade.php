<x-app-layout>

@extends('layout')
 <div class="row" style="margin:20px;">
            <div class="col-12">
             
                <div class="card">
                    <div class="card-header">
                        <h2>La liste des Sujets</h2>
                    </div>
                  <div  style="display: flex; justify-content: space-between;">
                     <a href="{{route('sujets.create')}}" class="nav-link"><button type="button" class="btn btn-success">Propose un sujet</button></a> 
                     <div style="margin-left: 10px;"></div>
                     
                     <a href="{{url('sujetss')}}" class="nav-link"><button type="button" class="btn btn-success">Liste des sujet externe</button></a>   
                      </div>
                      
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
                                        <th>Specialite concerne</th>
                                        <th>L'encadrant</th>

                                  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $sujets as $sujet)
        
                                <td><a href="{{ route ('sujets.show',$sujet)}}">{{ $sujet -> titre}}</a></td>
                                        <td>{{ $sujet -> description}}</td>  
                                           <td>{{ $sujet -> mot_clé}}</td>
                                           <td>{{ $sujet -> specialite}}</td>
                                        <td>{{ $sujet->user->nom }} {{ $sujet->user->prenom }}</td>
                                     
                                      
            
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
  
        </div>
</x-app-layout>
