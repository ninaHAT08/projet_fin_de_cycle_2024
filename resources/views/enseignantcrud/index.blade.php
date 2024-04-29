<x-app-layout  class="bg-white">

    @extends('etudiant.layout')
  
<div class="row" >
    <div class="col-12">
                <div class="p-3 mb-2 bg-info-subtle text-info-emphasis">
                        <h1 style="font-size: 40px; color: black; text-align: center;">La liste des enseignants</h1> 
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/enseignantuser/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                               Ajouter un enseignant
                        </a>
                        <div style="margin-left: 1050px;">
     @include('partials.searchensg')
     </div>
                     
                        
                        <div class="table-responsive">
                        <table class="table"  style=" background-color: #FFFFFF;">
                               <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Domaine d'expertise</th>                                    
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enseignant  as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->specialite}}</td>
                                        <td>{{ $item->email }}</td>
  
                                        <td>
                                        <a href="{{ url('/enseignantt/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button></a>
            
  
                                            <form method="POST" action="{{ url('/enseignantuser' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirmation de la suppression?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprime</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <a href="{{url('admin')}}" class="nav-link btn-retour"><button type="button" class="btn btn-dark">Retour</button></a>  
                            </table>
                        </div>
  
                    </div>
                </div>
          
  </div>
</div>

<style>
        .btn-retour {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
    </style>
</x-app-layout>