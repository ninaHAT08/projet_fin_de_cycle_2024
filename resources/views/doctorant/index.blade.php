<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Doctorant</title>
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


    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css1/bootstrap.min.css">
   
   <!-- Style -->
   <link rel="stylesheet" href="css1/style.css">
   <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
        <!-- Navbar Brand-->
        <img src="images/pfcc.png" alt="" style="width: 145px;height: 50px;">
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
                    <li><x-dropdown-link :href="route('profile.edit')">{{ __('Profil') }}</x-dropdown-link></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Deconnexion') }}</x-dropdown-link>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-center">La liste des doctorants</h1>
                        <ol class="breadcrumb mb-4">
                           
                            <li class="breadcrumb-item active"></li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               liste des doctorants
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                               
                                <button class="btn btn-primary  mb-4">
                                <a class="nav-link text-white" href="{{ url('/doctorant/create') }}">ajouter un doctorant</a>     
                      </button>   
                                
                                <thead>
                                      
                                            <tr>
                                            <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date Naissance</th>
                                        <th>type these</th>
                                        <th>Diplome</th>
                                        <th>annee inscription</th>                                        
                                        <th>Email</th>
                                        <th>Actions</th>
                                            </tr>
                                       
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date Naissance</th>
                                        <th>type these</th>
                                        <th>Diplome</th>
                                        <th>annee inscription</th>                                       
                                        <th>Email</th>
                                        <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                   
                                        <tbody>
                                        @foreach($doctorants  as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->date_naiss }}</td>
                                        <td>{{ $item->type_these }}</td>
                                        <td>{{ $item->diplome_doctorant }}</td>
                                        <td>{{ $item->annee_ins }}</td>
                                         <td>{{ $item->email }}</td>
  
                                        <td>
                                        <div class="d-flex gap-2">
                                        <!-- <a href="{{ url('/enseignantt/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> voir</button></a> -->
            
  
                                        <form method="POST" action="{{ url('/doctorant' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirmation de la suppression?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprime</button>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
