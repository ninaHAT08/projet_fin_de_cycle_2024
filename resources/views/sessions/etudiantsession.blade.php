<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
   
    <title>Gantt Chart</title>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/locales/en-us.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<style>
        
        .page-title {
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 2em;
    color: #333;
    font-weight: bold;
}
        /* #container {
            width: 100%;
            height: 100%;
            margin-top: 60px;

            display: flex;
            justify-content: center;
            align-items: center;
        } */
        #container {
        display: flex;
        justify-content: space-between;
        margin: 20px; /* Marge extérieure pour l'espacement entre les tableaux */
        height: 300px;
        padding: 20px 30px 30px 30px;
     }
     .anychart-plot {
            
            height: 100%;
        }
    
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
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark  night-blue">
            <!-- Navbar Brand-->
            <img src="images/pfcc.png" alt=""  style="width: 145px;height: 50px;">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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

       
        <div id="layoutSidenav" style="display: flex;">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-beige" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ url('dashboard') }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="text-white">Accueil</div>
                        </a>
                        <a class="nav-link" href="{{ route('etudiantP.edit', Auth::user()->id) }}">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-user-edit"></i></div>
                            <div class="text-white">Modifier Profil</div>
                        </a>
                        <nav class="menu-nested">
                        <a class="nav-link text-white" href="{{ route('etudiantsession') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-calendar"></i></div>
                                Sessions
                            </a>
                        <a class="nav-link text-white" href="{{ url('espaceetudiant') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-list"></i></div>
                                consulter liste sujet
                            </a>
                            <?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    $userId = Auth::id();

    // Vérifiez si l'utilisateur connecté ou son binôme a déjà envoyé la fiche
    $choix = DB::table('choix')
                ->where(function($query) use ($userId) {
                    $query->where('idUser3', $userId)
                          ->orWhere('binome', $userId);
                })
                ->where('envoyer', 1)
                ->first();

    $ficheEnvoyee = $choix ? true : false;
    ?>

    <a class="nav-link text-white" href="{{ $ficheEnvoyee ? '#' : route('choix.ajouter') }}"
       @if ($ficheEnvoyee)
           onclick="event.preventDefault(); alert('Une fiche de vœux a déjà été remplie avec votre nom. Vous ne pouvez plus modifier vos choix ni remplir une autre fiche.');"
       @else
           onclick="event.preventDefault(); document.getElementById('form-choix').submit();"
       @endif
    >
        <div class="sb-nav-link-icon text-white"><i class="fas fa-file-alt"></i></div>
        ma fiche de vœux
    </a>
    <form id="form-choix" action="{{ route('choix.ajouter') }}" method="GET" style="display: none;">
        @csrf
    </form>

                            <a class="nav-link text-white" href="{{ route('affichage.affectation') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-check-circle"></i></div>
                                mes affectations
                            </a>
                        </nav>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                            <div class="text-white">AUTRE</div>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white" href="{{ route('sujetss.create') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-plus"></i></div>
                                proposer un sujet
                            </a>
                            <a class="nav-link text-white" href="{{ route('mmaliste') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-clipboard-list"></i></div>
                                mon sujet
                            </a>
                            <a class="nav-link text-white" href="{{ url('sujetss') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-external-link-alt"></i></div>
                                voir la liste des sujets externes
                            </a>
                            <a class="nav-link text-white" href="{{ route('etudiant.enseignants-choisis') }}">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tasks"></i></div>
                                choix sujets
                            </a>
                            
                     </nav>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
        <main>
<h2 class="page-title"> Les sessions pour l'année 2024 </h2>
<div   id="container">
<div class="anychart-plot  " id="gantt"></div>

    <?php
    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "gestionpfc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    $sql = "SELECT intitule_session, date_debut, date_fin FROM sessions_pfc";
    $result = $conn->query($sql);

    $sessions = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sessions[] = $row;
        }
    }

    $conn->close();
    ?>

    <script>
        anychart.onDocumentReady(function() {
            var chart = anychart.ganttProject();

            var data = [
                <?php foreach ($sessions as $session): ?>
                {
                     id: "<?php echo $session['intitule_session']; ?>",
                    name: "<?php echo $session['intitule_session']; ?>",
                    actualStart: "<?php echo $session['date_debut']; ?>",
                    actualEnd: "<?php echo $session['date_fin']; ?>"
                },
                <?php endforeach; ?>
            ];

            chart.data(data);

            chart.container("container");
            chart.draw();
        });
    </script>
    </div>
 
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><p>
      © 2024 All Rights Reserved By  <strong>GndznHtm</strong>
     
    </p></div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

