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

    <!-- Custom CSS -->
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
    .congratulations-card {
        border: 2px solid #28a745;
        border-radius: 10px;
        padding: 90px;
        background-color: #e6ffee;
        color: #155724;
        margin: 50px;
        max-width: 600px; /* Width of the card */
        text-align: center; /* Center text inside the card */
        justify-content: center;
    }

    .congratulations-card h2 {
        color: #28a745;
        font-size: 2.5em;
    }
    .congratulations-card h5 {
        color: #28a740;
        font-size: 2em;
    }
    .congratulations-card p {
        font-size: 1.2em;
    }

    .congratulations-card strong {
        color: #155724;
    }

    .center-div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 110vh; /* Adjust based on your preference */
    }
</style>
</head>

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
            <!-- Navbar Brand-->
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
            <!-- Sidebar Toggle-->
            <!-- /<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
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
    <div id="layoutSidenav center">
        <div id="layoutSidenav_nav mb-3">
            <div class="center-div">
                <div class="congratulations-card">
                    @if ($user->etat && $user->sujet)
                        <h2>Congratulations !<h5>Vous avez été affecté à un sujet</h5></h2>
                       
                        <p> Titre du Sujet:<strong>{{ $user->sujet->titre }}</strong> </p>
                        @if ($user->sujet && $user->sujet->user1)
                <p> Proposé par:<strong>{{ $user->sujet->user1->nom }} {{ $user->sujet->user1->prenom }}</strong> </p>
            @else

                            <p>Proposé par: Utilisateur non défini</p>
                        @endif
                        <p>état d'affectation:<strong>Affecté</strong></p>
                    @else
                        <p>Vous n'avez pas encore été affecté à un sujet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>