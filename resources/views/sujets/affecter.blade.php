

<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SUJETS</title>
    <style>
        .night-blue {
            background-color: #2a5b85; /* Couleur bleu nuit */
=======
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Espace enseignant</title>
        <style>
        .night-blue {
            background-color: #1e3d59; 
            /* background-color: #1e847f; */
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
        }
        .text-white {
            color: white;
        }
<<<<<<< HEAD
       .bg-beige{
        background-color: #1e3d59; 
       }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-switch-button@2.1.0/dist/bootstrap-switch-button.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-switch-button@2.1.0/dist/bootstrap-switch-button.min.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
=======
        .bg-beige {
    background-color: #ff6e40;
}
       
    </style>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark  night-blue">
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
            <!-- Navbar Brand-->
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group text-white">
<<<<<<< HEAD
              {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
=======
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li> <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link></li>
                        <li><form method="POST" action="{{ route('logout') }}">
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
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark  bg-beige"  id="sidenavAccordion">
         
                    <div class="sb-sidenav-menu">
                        <div class="nav " >
                            <div class="sb-sidenav-menu-heading"></div>
<<<<<<< HEAD
                            <a class="nav-link"   href="enseignant">
                                <div class="sb-nav-link-icon text-white" ><i class="fas fa-tachometer-alt"  ></i></div>
                             <div class="text-white"> PROJETS FIN DE CYCLE</div> 
=======
                            <a class="nav-link"   href="{{ url('enseignant') }}">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"  ></i></div>
                              Accueil
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                             <div class="text-white">Sujets PFC </div>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav text-white">
                                    <a class="nav-link text-white" href="{{route('sujets.create')}}">proposer un sujet </a>
<<<<<<< HEAD
                                    <a class="nav-link text-white" href="{{route('maliste')}}"> voir ma liste des sujets </a>
=======
                                    <a class="nav-link text-white" href="{{route('maliste')}}"> voir ma liste des sujets  </a>
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
                                    <a class="nav-link text-white" href="{{ route('affectation') }}">Voir la liste des choix</a>
                                    <a class="nav-link text-white" href="{{ route('enseignantpublier') }}">La liste des sujet publier</a>
                                    
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                              <div class="text-white">AUTRE</div> 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                      Gestion des sujets externes
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="#"></a> 
                                            <a class="nav-link text-white" href="{{url('enseaignantsujetexterne')}}">voir la liste des sujets externes</a>
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>
                          
                    </div>
<<<<<<< HEAD
                        
=======
                   
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
                </nav>
            </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 ">
                    <div style="display: inline-block;" class="info-item">
                        
                    </div>
             
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('enseignant') }}"><h5>retour</h5></a></li>
                    </ol>
                    <div class="card mb-4">
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
                        <div class="card-header ">
                            <i class="fas fa-table me-1"></i>
                            <h4>Liste sujet affecté pour les etudiants</h4>
                        </div>
                        <div class="card-body">
                          
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Nom</th>
                                            <th>prenom</th>
                                             <th>Spécialité Étudiant </th>
                                            <th>Titre</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                               
                                        <tr>
                                           
                                            <th>Nom</th>
                                            <th>prenom</th>
                                             <th>Spécialité Étudiant </th>
                                            <th>Titre</th>
                                           
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                   
                                    @forelse ($etudiantsAvecSujets as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->specialite }}</td>
                    <td>{{ $etudiant->titre }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucun étudiant affecté.</td>
                </tr>
            @endforelse
            </tbody>
                                </table>
           </div>
      </div>
     </div>
 </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            <p>© 2024 All Rights Reserved By <strong>GndznHtm</strong></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
   
  

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

   
</body>
</html>