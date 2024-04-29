<x-app-layout>
@extends('layout')
 <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>La liste des Sujets externe</h2>
                    </div>
                  <!--  <a href="{{route('sujetss.create')}}" class="nav-link"><button type="button" class="btn btn-success">Propose un sujet</button></a>  -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    
                                        <th>Titre</th>   
                                        <th>Description</th>
                                        <th>Mot_clé</th>
                                        <th>Specialite </th>
                                        <th>Entreprise </th>
                                        <th>L'etudiant</th>
                                      
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $sujets as $sujet)
        
                                <td><a href="{{ route ('sujetss.show',$sujet)}}">{{ $sujet -> titre}}</a></td>
                                        <td>{{ $sujet -> description}}</td>  
                                           <td>{{ $sujet -> mot_clé}}</td>
                                           <td>{{ $sujet -> specialite}}</td>
                                           <td>{{ $sujet -> nom_entreprise}}</td>
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
  
 
</x-app-layout>
