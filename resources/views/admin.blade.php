<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Departement  informatique</title>
        <style>
        .night-blue {
            /* background-color: #037492; Couleur bleu nuit */
            background-color:#058FB2;
        }
        .page-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 3em;
    color: #333;
    font-weight: bold;
}
        .text-white {
            color: white;
        }
       .bg-beige{
        background-color: #058FB2; 
       }
   
       .chart-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
           
            margin-bottom: 40px;
        }
       .chart-wrapper {
           width: 30%; 
            
            text-align: center;
        } 
        .chart-wrapper1{
            width: 50%;
        }
        .chart-wrapper2{
            width: 40%;
            text-align: center;
          padding: top 30px;;
        }
      
        canvas {
            width: 100% !important;
            height: auto !important;
        }
        .chart {
    width: 20%; 
    height: auto; /* Ajustez la hauteur automatiquement */
}
#sujetsPieChart {
    width: 10px; 
    height:10px; 
}
.row{
    padding: 20px 30px 30px 30px;
    padding-left: 150px;
}
.row1{
    padding: 20px 20px 30px 30px;
    padding-left: 100px;
}
  h3{
    text-align: justify;
    display: flex;
    
  }
    </style>
       <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark  night-blue">
            <!-- Navbar Brand-->
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
                        <a class="nav-link" href="{{ url('doctorant') }}">
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
                         
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
            <div id="layoutSidenav_content">
                <main>
                <?php
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=gestionpfc', 'root', '');
        
        // Récupérer le nombre total de sujets
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM sujet");
        $stmt->execute();
        $nombreTotalDeSujets = $stmt->fetchColumn();

        // Récupérer le nombre de sujets publiés
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM sujet WHERE publier = 1");
        $stmt->execute();
        $nombreDeSujetsPublies = $stmt->fetchColumn();

        // Récupérer le nombre de sujets affectés
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM sujet WHERE Sujet_affecter = 1");
        $stmt->execute();
        $nombreSujetsAffectes = $stmt->fetchColumn();
    ?>
              

               
<div class="row">
    <div class="col-md-2">
        <div class="card text-white bg-info mb-5">
            <div class="card-header ">
                <i class="fas fa-check-circle"></i> Sujets totaux
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $nombreTotalDeSujets }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card text-white bg-info mb-5">
            <div class="card-header ">
                <i class="fas fa-check-circle"></i> Sujets publiés
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $nombreDeSujetsPublies }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card text-white bg-danger mb-5">
            <div class="card-header">
                <i class="fas fa-times-circle"></i> Sujets non publiés
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $nombreTotalDeSujets - $nombreDeSujetsPublies }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card text-white bg-info mb-5">
            <div class="card-header">
                <i class="fas fa-check-circle"></i> Sujets affectés
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $nombreSujetsAffectes }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card text-white bg-danger mb-5">
            <div class="card-header">
                <i class="fas fa-times-circle"></i> Sujets non affectés
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $nombreTotalDeSujets - $nombreSujetsAffectes }}</h5>
            </div>
        </div>
    </div>
</div>
<div class="row1">
    <div class="chart-container">
        <div class="chart-wrapper1" >
            <h4>Diagramme à Barres - Sujets Publiés</h4>
            <canvas id="sujetsChart" ></canvas>
        </div>
        <div class="chart-wrapper" >
            <h3 >Diagramme Circulaire </h3>
            <canvas id="sujetsPieChart" ></canvas>
        </div>
    </div>
    <div class="chart-container  ">
        <div class="chart-wrapper1" >
            <h4>Diagramme à Barres - Sujets Affectés</h4>
            <canvas id="sujetsAffectesChart"></canvas>
        </div>
        <div class="chart-wrapper2  " >
            <h4 >Diagramme en Anneau </h4>
            <canvas id="sujetsDoughnut"></canvas>
        </div>
    </div>
 
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables PHP converties en JavaScript
        var nombreTotalDeSujets = <?php echo $nombreTotalDeSujets; ?>;
        var nombreDeSujetsPublies = <?php echo $nombreDeSujetsPublies; ?>;
        var nombreSujetsNonPublies = nombreTotalDeSujets - nombreDeSujetsPublies;
        var nombreSujetsAffectes = <?php echo $nombreSujetsAffectes; ?>;
        var nombreSujetsNonAffectes = nombreTotalDeSujets - nombreSujetsAffectes;

        // Graphique à barres - Sujets
        var ctx = document.getElementById('sujetsChart').getContext('2d');
        var sujetsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total des sujets', 'Sujets publiés', 'Sujets non publiés'],
                datasets: [{
                    label: 'Nombre de sujets',
                    data: [nombreTotalDeSujets, nombreDeSujetsPublies, nombreSujetsNonPublies],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // couleur pour le total des sujets
                        // 'rgba(139, 0, 0, 0.2)',
                        'rgba(54, 162, 235, 0.2)', // couleur pour les sujets publiés
                        'rgba(255, 206, 86, 0.2)'  // couleur pour les sujets non publiés
                        // 'rgba(0, 128, 0, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique circulaire - Sujets Publiés
        var ctxPie = document.getElementById('sujetsPieChart').getContext('2d');
        var sujetsPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Sujets publiés', 'Sujets non publiés'],
                datasets: [{
                    label: 'Nombre de sujets',
                    data: [nombreDeSujetsPublies, nombreSujetsNonPublies],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // couleur pour les sujets publiés
                        'rgba(255, 206, 86, 0.2)'  // couleur pour les sujets non publiés
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed;
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });

        // Graphique à barres - Sujets Affectés
        var ctxAffectes = document.getElementById('sujetsAffectesChart').getContext('2d');
        var sujetsAffectesChart = new Chart(ctxAffectes, {
            type: 'bar',
            data: {
                labels: ['Total des sujets', 'Sujets affectés', 'Sujets non affectés'],
                datasets: [{
                    label: 'Nombre de sujets',
                    data: [nombreTotalDeSujets, nombreSujetsAffectes, nombreSujetsNonAffectes],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // couleur pour le total des sujets
                        'rgba(54, 162, 235, 0.2)', // couleur pour les sujets affectés
                        'rgba(255, 206, 86, 0.2)'  // couleur pour les sujets non affectés
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique en anneau - Répartition des Sujets
        var ctxDoughnut = document.getElementById('sujetsDoughnut').getContext('2d');
        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Sujets affectés', 'Sujets non affectés'],
                datasets: [{
                    label: 'Répartition des sujets',
                    data: [nombreSujetsAffectes, nombreSujetsNonAffectes],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // couleur pour les sujets affectés
                        'rgba(255, 206, 86, 0.2)'  // couleur pour les sujets non affectés
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        });
    });
    </script>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>-->o
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script> 

</body>
</html>
