
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SUJETS</title>
    <style>
            .night-blue {
            /* background-color: #037492; Couleur bleu nuit */
            background-color:#058FB2;
        }
      
        .text-white {
            color: white;
        }
       .bg-beige{
        background-color: #058FB2; 
       }
       
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
        <!-- Navbar Brand-->
        <img src="images/pfcc.png" alt="" style="width: 145px;height: 50px;">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group text-white ">
            {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
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
   
    <div id="layoutSidenav" style="display: flex;">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-beige" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ url('admin') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="text-white">Accueil</div>
                        </a>
                        <a class="nav-link" href="{{ route('enseignantt.index') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user-tie"></i></div>
                            <div class="text-white">Enseignants</div>
                        </a>
                        <a class="nav-link" href="{{ url('doctorantt') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user-graduate"></i></div>
                            <div class="text-white">Doctorants</div>
                        </a>
                        <a class="nav-link" href="{{ route('etudiant.index') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user"></i></div>
                            <div class="text-white">Etudiants</div>
                        </a>
                        <nav class="menu-nested">
                            <a class="nav-link text-white" href="{{ route('sessions.index') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-calendar"></i></div>
                                Sessions
                            </a>
                            <a class="nav-link collapsed"  href="{{route('sujets_pfc')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></i></div>
                            <div class="text-white">PFC</div> 
                            </a>

                            <a class="nav-link text-white" href="{{ route('statistique') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-chart-pie"></i></div>
                                Statistiques
                            </a>
                            <a class="nav-link text-white" href="{{ route('soutenance.indexx') }}">
        <div class="sb-nav-link-icon text-white"><i class="fas fa-calendar-check"></i></div>
        PV Soutenances
    </a>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">La liste des etudiants qui non pas de sujet</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('statistique') }}"><h5>retour</h5></a></li>
                     
                        <li class="breadcrumb-item active"></li>
                    </ol>
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
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <!-- <h4>La liste des etudiants qui non pas de sujet</h4> -->
                        </div>
                        <div class="card-body">
                         
                            
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table" style="background-color: #F5F5F5;">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Spécialité</th>
                                            
                                    
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Spécialité</th>
                                     
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                 
            <li>  </li>
   
        @foreach($etudiantsAvecEtatNullOuFalse as $etudiant)
                                            <tr>
                                                <td>{{ $etudiant->nom }}</td>
                                                <td>{{ $etudiant->prenom }}</td>
                                                <td>{{ $etudiant->specialite }}</td>
                                              
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <p>Nombre total d'étudiants non affecte :<strong> {{ $nombreEtudiantsEtatNullOuFalse }}</strong></p>
                                </table>
                            </div>
                   
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            <p>
                                © 2024 All Rights Reserved By <strong>GndznHtm</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>

