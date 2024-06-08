<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SUJETS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
        <!-- Navbar Brand-->
        <img src="images/logo20.png" alt="" style="width: 180px;height: 50px;">
        <!-- Sidebar Toggle-->
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group text-white">
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
            </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li> <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
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
<p style="font-size: 20px; color: black; "><strong>Nom:</strong> {{ Auth::user()->nom }}</p>
    <p style="font-size: 20px; color: black; "><strong>Spécialité:</strong> {{ Auth::user()->specialite }}</p>
</div>
<div style="display: inline-block;" class="info-item">
<p style="font-size: 20px; color: black; "><strong>Prénom:</strong> {{ Auth::user()->prenom }}</p>
   
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
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><h5>retour</h5></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol> 
 

<div class="card-header bg-primary">
                                <i class="fas fa-table me-1"></i>
                               <h4>la fiche des voeux</h4>
                            </div>
                


                            <div class="card-body">
                                <table id="datatablesSimple">

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
                <td>{{ $choix->date }}</td>
                <td>{{ $choix->binome ? \App\Models\users::find($choix->binome)->nom . ' ' . \App\Models\users::find($choix->binome)->prenom : 'Aucun binôme' }}</td>
               
                <td>
                <form method="POST" action="{{ route('choix.destroy', $choix->id) }}" accept-charset="UTF-8" style="display:inline"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce user ?');">
                                                       @method('DELETE') 
                                                       @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm "  >
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i> supprimer</button> 
                                                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex gap-2">
    <form action="{{ route('choix.envoyer') }}" method="POST">
    @csrf
 
        <button type="submit" class="btn btn-info mt-2">Envoyer tous les choix</button>
       
    
  </form>

</div> 
<button id="generatePDF" class="btn btn-primary mt-2">Télécharger en PDF</button>                        
   </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
