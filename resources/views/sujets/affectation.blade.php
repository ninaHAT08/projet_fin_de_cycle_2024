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
            background-color: #2a5b85; /* Couleur bleu nuit */
        }
        .text-white {
            color: white;
        }
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
            <!-- Navbar Brand-->
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
            <!-- Sidebar Toggle-->
           
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group text-white">
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
                            <a class="nav-link"   href="enseignant">
                                <div class="sb-nav-link-icon text-white" ><i class="fas fa-tachometer-alt"  ></i></div>
                             <div class="text-white"> PROJETS FIN DE CYCLE</div> 
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
                                    <a class="nav-link text-white" href="{{route('maliste')}}"> voir ma liste des sujets </a>
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
                   
                </nav>
            </div>
    <!-- <div id="layoutSidenav"> -->
        <div id="layoutSidenav_content">
        <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Liste sujet choisis</h1>
                   
                <!-- <div class="container-fluid px-4 ">
                    <div style="display: inline-block;" class="info-item">
                        <p style="font-size: 20px; color: black;"><strong>Nom:</strong> {{ Auth::user()->nom }}</p>
                        <p style="font-size: 20px; color: black;"><strong>Prénom:</strong> {{ Auth::user()->prenom }}</p>
                  
                    </div>
              -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('enseignant') }}"><h5>retour</h5></a></li>
                    </ol>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('affecter')}}" class="nav-link"><button type="button"  class="btn btn-primary">Sujets affecte</button></a>   
                   </li>
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
                            <h4>Liste sujet choisis</h4>
                        </div>
                        <div class="card-body">
                            @if($choixs->isEmpty())
                                <p>Aucun sujet n'a été envoyé pour le moment.</p>
                            @else
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Étudiant </th>
                                            <th>Spécialité Étudiant </th>
                                            <th>Binôme</th>
                                            <th>Spécialité Binôme</th>
                                            <th>Sujet Affecté</th>
                                            <th>Date de la Sélection</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Étudiant 1</th>
                                            <th>Spécialité Étudiant 1</th>
                                            <th>Binôme</th>
                                            <th>Spécialité Binôme</th>
                                         
                                            <th>Sujet Affecté</th>
                                            <th>Date de la Sélection</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($choixs as $choix)
                                            <tr>
                                                <td>{{ \App\Models\Sujet::find($choix->idSujet1)->titre }}</td>
                                                <td>{{ \App\Models\users::find($choix->idUser3)->nom }} {{ \App\Models\users::find($choix->idUser3)->prenom }}</td>
                                                <td>{{ \App\Models\users::find($choix->idUser3)->specialite }}</td>
                                                <td>
                                                    @if ($choix->binome)
                                                        {{ \App\Models\users::find($choix->binome)->nom }} {{ \App\Models\users::find($choix->binome)->prenom }}
                                                    @else
                                                        Aucun binôme
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($choix->binome)
                                                        {{ \App\Models\users::find($choix->binome)->specialite }}
                                                    @else
                                                        Aucun binôme
                                                    @endif
                                                </td>
                                              
                                                <td>
                                                <form action="{{ route('sujets.affecter', $choix->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                   affecte
                </button>
            </form>
</td>
                                            </td>

                                                <td>{{ $choix->date }}</td>
                                                <td>
                                                    <!-- <a href="#" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Modifier</button></a> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
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