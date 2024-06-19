<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Espace enseignant</title>
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
        <img src="images/pfcc.png" alt="" style="width: 145px; height: 50px;">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
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
                    <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>
                    </li>
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
                        <a class="nav-link" href="{{ url('enseignant') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="text-white">Accueil</div>
                        </a>
                        <a class="nav-link" href="{{ route('enseignantP.edit', Auth::user()->id) }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user-edit"></i></div>
                            <div class="text-white">Modifier Profil</div>
                        </a>
                        <nav class="menu-nested">
                        <a class="nav-link text-white" href="{{ route('sessionenseignant') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-calendar"></i></div>
                                Sessions
                            </a>
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
                                Affectation
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
                        <a class="nav-link text-white" href="{{ route('soutenance.index') }}">
        <div class="sb-nav-link-icon text-white"><i class="fas fa-calendar-check"></i></div>
        PV Soutenances
    </a>
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
                    <h1 class="mt-4 text-center">Liste des soutenances</h1>
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
                        <div class="card-header">
                            <a href="{{ route('soutenance.create') }}" class="btn btn-primary">Créer soutenance</a>
                        </div>
                        <div class="card-body">
                            @if($soutenances->isEmpty())
                                <p>Aucune soutenance n'a été planifiée pour le moment.</p>
                            @else
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>Session</th>
                                            <th>Date de soutenance</th>
                                            <th>Étudiant(s)</th>
                                            <th>Binome</th>
                                            <th>Président du jury</th>
                                            <th>Encadrant</th>
                                            <th>Examinateur 1</th>
                                            <th>Examinateur 2</th>
                                            <th>Mémoire</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Session</th>
                                            <th>Date de soutenance</th>
                                            <th>Étudiant(s)</th>
                                            <th>Binome</th>
                                            <th>Président du jury</th>
                                            <th>Encadrant</th>
                                            <th>Examinateur 1</th>
                                            <th>Examinateur 2</th>
                                            <th>Mémoire</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($soutenances as $soutenance)
                                            <tr>
                                                <td>{{ $soutenance->session }}</td>
                                                <td>{{ $soutenance->date_soutenance }}</td>
                                                <td>{{ $soutenance->etudiant->prenom }} {{ $soutenance->etudiant->nom }}</td>
                                                @if ($soutenance->etudiant2)
                                                    <td>{{ $soutenance->etudiant2->prenom }} {{ $soutenance->etudiant2->nom }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>{{ $soutenance->presidentJury->prenom }} {{ $soutenance->presidentJury->nom }}</td>
                                                <td>{{ $soutenance->enseignant1->prenom }} {{ $soutenance->enseignant1->nom }}</td>
                                                <td>{{ $soutenance->enseignant2->prenom }} {{ $soutenance->enseignant2->nom }}</td>
                                                @if ($soutenance->enseignant3)
                                                    <td>{{ $soutenance->enseignant3->prenom }} {{ $soutenance->enseignant3->nom }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>
                                                    @if ($soutenance->memoire)
                                                    <a href="{{ asset('storage/' . $soutenance->memoire) }}" target="_blank">Voir le mémoire</a>
                                                    @else
                                                        Aucun mémoire disponible
                                                    @endif
                                                </td>
                                                <td>{{ $soutenance->note }}</td>
                                                <td>
                                                    <a href="{{ route('soutenance.edit', $soutenance->id) }}" class="btn btn-primary btn-sm">Modifier</a>
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