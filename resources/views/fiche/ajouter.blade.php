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
<div class="card-body" style="background-color:   lightblue; margin:20px;">
<div style="display: inline-block;" class="info-item">
    <p style="font-size: 20px; color: black; font-weight: bold;">Nom: {{ Auth::user()->nom }}</p>
    <p style="font-size: 20px; color: black; font-weight: bold;">Prénom: {{ Auth::user()->prenom }}</p>
</div>
<div style="display: inline-block;" class="info-item">
    <p style="font-size: 20px; color: black; font-weight: bold;">Spécialité: {{ Auth::user()->specialite }}</p>
    <p style="font-size: 20px; color: black; font-weight: bold;">Email: {{ Auth::user()->email }}</p>
</div>
</div>
</div>
<div class="row" style="margin:20px;">
<a href="{{url('etudiantsujet')}}" ><button type="button" class="btn btn-dark">Retour</button></a> 
    <div class="col-12">
  <h2 style="font-size: 50px; color: black; text-align: center;font-weight: bold;">  Fiche de veoux</h2> 
            <div class="table-responsive">
                            <table  id="fichesTable" class="table" style=" background-color: pink-100;">
                                 <thead>
                                 <tr>
                                        <th>id sujet</th>
                                        <th>Titre</th>
                                         <th>Description</th>
                                         <th>Mot-clé</th>
                                        <th>Spécialité</th>
                                        <th>Encadrant</th>
                                        <th>Option</th>
                                

                                 </tr>
                                 </thead>
                                 <tbody>
                                  @foreach ($fiches as $fiche)
                                      <tr>
                                          <td>ID Sujet: {{ $fiche->idSujets }}</td>
                                          <td>  {{ \App\Models\sujets::find($fiche->idSujets)->titre }} </td>
                                          <td>  {{ \App\Models\sujets::find($fiche->idSujets)->description }} </td>
                                          <td>  {{ \App\Models\sujets::find($fiche->idSujets)->mot_clé }} </td>
                                          <td>  {{ \App\Models\sujets::find($fiche->idSujets)->specialite }} </td>
                                          <td>{{ \App\Models\sujets::find($fiche->idSujets)->user->nom }}</td>
                                                     
                                        <td><form action="{{route('fiche.destroy', $fiche->idfiche) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                       </form></td>
                                        </tr>
                                  @endforeach
                                </tbody>
         
                            </table>
                        </div>
                        <div style="text-align: center;">
                        <button type="submit" class="btn btn-info" style="margin-right: 10px;">Envoyer</button>
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

</x-app-layout>