
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
            background-color: #1e3d59; /* Couleur bleu nuit */
        }
        .text-white {
            color: white;
        }
       
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
        <!-- Navbar Brand-->
        <img src="images/pfcc.png" alt="" style="width: 180px;height: 50px;">
        <!-- Sidebar Toggle-->
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
    <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark  bg-beige"  id="sidenavAccordion">
         
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link"   href="{{url('dashboard')}}">
                                <div class="sb-nav-link-icon text-white" ><i class="fas fa-tachometer-alt"  ></i></div>
                               <div class="text-white">PROJETS FIN DE CYCLE</div>
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                            <div class="text-white">Sujets PFC </div> 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="{{ url('espaceetudiant') }}">consulter liste sujet </a>
                                    <a class="nav-link text-white" href="{{route('choix.ajouter')}}"> ma fiche de voeux</a>
                                    <a class="nav-link text-white" href="{{route('affichage.affectation')}}"> mes affectations </a>
                                    <!-- <a href="{{route('choix.ajouter')}}" class="nav-link"><button type="button" class="btn btn-secondary">Consulter ma fiche de veoux</button></a> -->
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                              <div class="text-white">AUTRE</div> 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                     <div class="text-white">Gestion des sujets externes</div> 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link text-white" href="{{route('sujetss.create')}}">proposer un sujet</a>
                                         
                                            <a class="nav-link text-white" href="{{url('sujetss')}}">voir la liste des sujets externes</a>
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>
                          
                    </div>
                   
                </nav>
            </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Le resultat de l'affectation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><h5>retour</h5></a></li>
                     
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
                            <h4>Le resultat de l'affectation</h4>
                        </div>
                        <div class="card-body">
                         
                            
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table" style="background-color: #F5F5F5;">
                                  
                                    <tbody>
                                    @if ($user->etat && $user->sujet)
            <h2>Congratulations!</h2>
            <p>Vous avez été affecté à un sujet:</p>
            <p><strong>Titre du Sujet:</strong> {{ $user->sujet->titre }}</p>
            @if ($user->sujet && $user->sujet->user1)
                <p><strong>Proposé par:</strong> {{ $user->sujet->user1->nom }} {{ $user->sujet->user1->prenom }}</p>
            @else
                <p>Proposé par: Utilisateur non défini</p>
            @endif
            <p><strong>État d'affectation:</strong> Affecté</p>
        @else
            <p>Vous n'avez pas encore été affecté à un sujet.</p>
        @endif
    </div> 
                                    </tbody>
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

