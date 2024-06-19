<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Mes choix des sujets externes</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .night-blue {
            background-color: #058FB2;
        }
        .text-white {
            color: white;
        }
        .bg-beige {
            background-color: #058FB2; 
        }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
        <img src="images/pfcc.png" alt="" style="width: 145px;height: 50px;">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group text-white">
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
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
                        <a class="nav-link" href="{{ url('enseignant') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="text-white">Accueil</div>
                        </a>
                        <a class="nav-link" href="{{ route('enseignantP.edit', Auth::user()->id) }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user-edit"></i></div>
                            <div class="text-white">Modifier Profil</div>
                        </a>
                        <nav class="menu-nested">
                            <a class="nav-link text-white" href="{{ route('sujets.create') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-plus"></i></div>
                                proposer un sujet
                            </a>
                            <a class="nav-link text-white" href="{{route('maliste')}}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-file-alt"></i></div>
                                voir ma liste des sujets
                            </a>
                            <a class="nav-link text-white" href="{{ route('affectation') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tasks"></i></div>
                                Voir la liste des choix
                            </a>
                            <a class="nav-link text-white" href="{{ route('enseignantpublier') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-check-circle"></i></div>
                                La liste des sujet publier
                            </a>
                        </nav>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                            <div class="text-white">AUTRE</div>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white" href="{{url('enseaignantsujetexterne')}}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-external-link-alt"></i></div>
                                voir la liste des sujets externes
                            </a>
                            <a class="nav-link text-white" href="{{ route('voir.choix') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tasks"></i></div>
                                mes choix
                            </a>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Mes choix des sujets externes</h1>
                    <ol class="breadcrumb mb=4">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <h4>Liste des choix</h4>
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table" style="background-color: #F5F5F5;">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Spécialité</th>
                                            <th>Mot clé</th>
                                            <th>Année universitaire</th>
                                            <th>Type de sujet</th>
                                            <th>Étudiant</th>
                                            <th>Nom de l'entreprise</th>
                                            <th>Maître du stage</th>
                                            <th>Affectation</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Spécialité</th>
                                            <th>Mot clé</th>
                                            <th>Année universitaire</th>
                                            <th>Type de sujet</th>
                                            <th>Étudiant</th>
                                            <th>Nom de l'entreprise</th>
                                            <th>Maître du stage</th>
                                            <th>Affectation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($choixSujets as $choix)
                                            <tr>
                                                <td>{{ $choix->sujet->titre }}</td>
                                                <td>{{ $choix->sujet->description }}</td>
                                                <td>{{ $choix->sujet->specialite }}</td>
                                                <td>{{ $choix->sujet->mot_cle }}</td>
                                                <td>{{ $choix->sujet->anneeUniv }}</td>
                                                <td>{{ $choix->sujet->typeSujet }}</td>
                                                <td>{{ $choix->sujet->user1->nom }} {{ $choix->sujet->user1->prenom }}</td>
                                                <td>{{ $choix->sujet->nomEntreprise }}</td>
                                                <td>{{ $choix->sujet->maitre_du_stage }}</td>
                                                <td>
                                                <form action="{{ route('affecter.sujets', $choix->sujet->idSujet) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">confirmé</button>
</form>
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
                            <p>© 2024 All Rights Reserved By <strong>GndznHtm</strong></p>
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