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
        .text-white {
            color: white;
        }
       .bg-beige{
        background-color: #058FB2; 
       }
       .page-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 3em;
    color: #333;
    font-weight: bold;
}
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Pour espacer les cartes */
}

.card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 30%; /* Adjusted width to fit four cards in a row */
    margin: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
   /* Ajustez la largeur des cartes en fonction de vos besoins */
    margin-bottom: 20px; /* Ajoutez un espace entre les cartes */
}

.card img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
}

.card-body {
    /* text-align: center; */
    padding: 15px;
}

.card-footer {
    padding: 10px;
    border-top: 1px solid #ddd;
    text-align: center;
}

.card-button {
    /* display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px; */
    display: block;
    width: 100%;
    background-color: #FBCA1B; /* Light orange color */
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 10px;
    cursor: pointer;
    font-size: 1em;
    border: none;
    border-radius: 0 0 5px 5px;
    transition: background-color 0.3s;
}

.card-button:hover {
    background-color: #FDDA04;
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

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-beige"  id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link"   href="{{url('admin')}}">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"  ></i></div>
                               <div class="text-white">Accueil</div> 
                            </a>
                            <a class="nav-link collapsed"   href="{{route('etudiant.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               <div class="text-white">Etudiants</div> 
                            </a>
                            <a class="nav-link collapsed"   href="{{route('enseignantt.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               <div class="text-white">Enseignants</div> 
                            </a>
                            <a class="nav-link collapsed"   href="{{ url('doctorant')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               <div class="text-white">Doctorants</div> 
                            </a>
                            <a class="nav-link collapsed"  href="{{route('sujets_pfc')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            <div class="text-white">PFC</div> 
                            </a>
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        <div class="text-white">Authentication</div>
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"> </i>
                                    </div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link text-white" href="#">Register</a>
                                          
                                        </nav>
                                    </div>
                                   
                                </nav>
                               
                            </div>
                          
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
            <h1 class="page-title">Statistique</h1>
            <div class="card-container">
                <div class="card">
                    <img class="card-img-top" src="images/tis.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Nombre de sujet</h4>
                        <p class="card-text">Le nombre de sujets propse par chaque enseignant</p>
                    </div>
                    <div class="card-footer">
                    <a class="card-button" href="{{ route('sujets-par-enseignant') }}">Voir Plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/sta.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Liste des affectations</h4>
                        <p class="card-text">La liste et le nombre des Étudiants avec Sujets</p>
                    </div>
                    <div class="card-footer">
                    <a class="card-button" href="{{ route('etudiants-avec-sujets') }}">Voir Plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/tique.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Liste des non Affecté</h4>
                        <p class="card-text">La liste et le nombre des etudiants qui non pas de sujet</p>
                    </div>
                    <div class="card-footer">
                    <a class="card-button" href="{{route('etudiants-sans-etat-true') }}">Voir Plus</a>

                    </div>
                </div>
                
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


