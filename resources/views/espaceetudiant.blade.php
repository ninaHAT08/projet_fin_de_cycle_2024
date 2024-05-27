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
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">La liste des projets fin de cycle</h1>
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
                        <div class="card-header bg-primary">
                            <i class="fas fa-table me-1"></i>
                            <h4>Liste des sujets</h4>
                        </div>
                        <div class="card-body">
                         
                            
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table" style="background-color: #F5F5F5;">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Spécialité</th>
                                            <th>Mot clé</th>
                                            <th>Année universitaire</th>
                                            <th>Enseignant</th>
                                            <th>Co-encadrant</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Spécialité</th>
                                            <th>Mot clé</th>
                                            <th>Année universitaire</th>
                                            <th>Enseignant</th>
                                            <th>Co-encadrant</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sujets as $sujet)
                                            <tr>
                                                <td>{{ $sujet->titre }}</td>
                                                <td>{{ $sujet->description }}</td>
                                                <td>{{ $sujet->specialite }}</td>
                                                <td>{{ $sujet->mot_cle }}</td>
                                                <td>{{ $sujet->anneeUniv }}</td>
                                                <td>{{ $sujet->user1->nom }} {{ $sujet->user1->prenom }}</td>
                                                <td>{{ $sujet->user2->nom ?? 'Aucun ' }} {{ $sujet->user2->prenom ?? 'co-encadrant' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- <a href="{{ route('sujets.show', $sujet) }}" title="Voir le sujet"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> voir</button></a> -->
                                                       
                                                        <form action="{{ route('choix.ajouter') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="idSujet" value="{{ $sujet->idSujet }}">
                                                            <button type="submit" class="btn btn-dark btn-sm bg-primary" >ajouter</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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