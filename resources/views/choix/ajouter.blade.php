 <x-app-layout>

@extends('layout') 

<!-- Afficher les messages de succès ou d'erreur -->
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

<!-- Afficher la liste des sujets ajoutés à la liste de l'utilisateur -->
<div class="card">
<div class="card-body border border-primary" style=" margin:20px;">
<div style="display: inline-block;" class="info-item">

    <p style="font-size: 20px; color: black; "><strong>Spécialité:</strong> {{ Auth::user()->specialite }}</p>
</div>
<div style="display: inline-block;" class="info-item">

   
<p style="font-size: 20px; color: black; "><strong>Email:</strong> {{ Auth::user()->email }}</p>
</div>
<div style="display: inline-block;" class="info-item">
    <label for="has_binome" style="font-size: 20px;"><strong>Vous avez un binôme :</strong></label>
    <input type="checkbox" id="has_binome" onclick="toggleBinomeForm()">

    <div id="binome_form" style="display: none; margin-top: 10px;">
        <form action="{{ route('choix.updateBinome') }}" method="POST">
            @csrf
            <div class="form-group">
               
                <select class="form-control" name="binome_id">
                    <option value="">Aucun</option>
                    @foreach ($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">ajouter </button>
        </form>
    </div>
</div>
</div>
</div>
<div class="container-fluid px-4">
<ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><h5>retour</h5></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
    <div class="col-12">
  <h2 style="font-size: 30px; color: black; text-align: center;">  <strong> Fiche de veoux  </strong> </h2> 
            <div class="table-responsive  mt-4">
                            <table  id="fichesTable" class="table" style=" background-color: pink-100;">
                                 <thead>
                                 <tr>
                                 <th>Titre</th>
                <th>Description</th>
                <th>Mot Clé</th>
                <th>Spécialité</th>
                <th>Année Univ</th>
                <th>Encadrant</th>
                <th>Co-encadrant</th>
                <th>Date</th>
                <th>Binôme</th>
              
                <th>Action</th>

                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach ($choixs as $choix)
                                 
                                 <tr>
                                 <td>{{ \App\Models\Sujet::find($choix->idSujet1)->titre }}</td>
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->description }}</td>
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->mot_cle }}</td>
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->specialite }}</td> 
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->anneeUniv }}</td> 
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->user1->nom }} {{ \App\Models\Sujet::find($choix->idSujet1)->user1->prenom }}</td> 
                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->user2->nom ?? 'Aucun ' }} {{ \App\Models\Sujet::find($choix->idSujet1)->user2->prenom ?? 'co-encadrant' }}</td> 
                
                <td>{{ $choix->date }} </td>
                
                <td>{{ $choix->binome ? \App\Models\users::find($choix->binome)->nom . ' ' . \App\Models\users::find($choix->binome)->prenom : 'Aucun binôme' }}</td>
        


         <td>
         <div class="d-flex gap-2">
                                        <!-- <form method="POST" action="{{ route('choix.destroy', $choix->id) }}" accept-charset="UTF-8" style="display:inline"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce choix ?');>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirmation de la suppression?')"><i class="fa fa-trash-o" aria-hidden="true"></i> supprimer</button>
                                            </form> -->
                                            <form method="POST" action="{{ route('choix.destroy', $choix->id) }}" accept-charset="UTF-8" style="display:inline"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce user ?');">
                                                       @method('DELETE') 
                                                       @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm "  >
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i> supprimer</button> 
                                                    </form>
                                          </div>
                </td>
       

          
    </tr>
@endforeach

                                </tbody>
         
                            </table>
                       
                        </div>
                        <div class="d-flex gap-2 mt-1">
                        <form action="{{ route('choix.envoyer') }}" method="POST">
    @csrf
 
        <button type="submit" class="btn btn-info ">Envoyer tous les choix</button>
       
    
  </form>
                        <button id="generatePDF" class="btn btn-primary">Télécharger en PDF</button>
                            </div>

                    </div>
                 
                 
   </div>
   <style>
    .info-item {
        display: inline-block;
        margin-right: 70px; /* Ajouter un espace de 20 pixels entre chaque élément */
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('generatePDF').addEventListener('click', function() {
        var nom = "{{ Auth::user()->nom }}";
        var prenom = "{{ Auth::user()->prenom }}";
        var specialite = "{{ Auth::user()->specialite }}";
        var email = "{{ Auth::user()->email }}";
        var content = `
            <div>
            <h2 style="font-size: 50px; color: black; text-align: center;font-weight: bold;">  Fiche de veoux</h2> 
                <p style="margin:20px;"><strong>Nom:</strong> ${nom}</p>
                <p style="margin:20px;"><strong>Prénom:</strong> ${prenom}</p>
                <p style="margin:20px;"><strong>Spécialité:</strong> ${specialite}</p>
                <p style="margin:20px;"><strong>Email:</strong> ${email}</p>
            </div>
            <br>
        `;
        var table = document.getElementById('fichesTable');
        var headerRow = table.getElementsByTagName('tr')[0];
        headerRow.deleteCell(-1); // Supprimer la dernière cellule de l'en-tête (colonne "Option")

        var rows = table.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            if (cells.length > 0) {
                rows[i].deleteCell(-1); // Supprimer la dernière cellule de chaque ligne (colonne "Option")
            }
        }

        // Ajouter le contenu HTML au début du contenu du tableau
        content += table.outerHTML;
       // content += document.getElementById('fichesTable').outerHTML;
        
        html2pdf().from(content).save('fichesTable.pdf');
    });
});
</script>
<script>
function toggleBinomeForm() {
    var checkbox = document.getElementById('has_binome');
    var form = document.getElementById('binome_form');
    if (checkbox.checked) {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}
</script>
</x-app-layout>