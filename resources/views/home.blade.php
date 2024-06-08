<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />


  <title>Informatique</title>
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
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed"> 
<!-- <body class="antialiased"> -->
  <!-- <div class="hero_area">
 
    <header class="header_section"> -->
      <!-- <div class="container-fluid"> -->
        <!-- <nav class="navbar navbar-expand-lg custom_nav-container pt-2"> -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark night-blue">
          <!-- <a class="navbar-brand" href="index.html"> -->
      
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
          
          <!-- </a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Accueil </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#aboute"> A propos </a>
                </li>
                

                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact</a>
                </li>
               <!-- <li class="nav-item">
                  <a class="nav-link" href="{{ url('/dashboard') }}">Connexion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                </li>-->
               
              </ul>
             
            </div>
          </div>
        </nav>
      <!-- </div>
    </header> -->
    <!-- end header section -->
   
   
     <!-- contact section -->



     <section class="contact_section layout_padding" id="connexion">
    <div class="container mt-5 pt-5">
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <!-- Email Address -->
             

            <!-- Email Address -->
            <div class="mb-2">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="exp@gmail.com"/>
                @if ($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-2">
                <x-input-label for="password" :value="__('')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="password" />
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Remember Me and Forgot Password Link on the same line -->
            <div class="flex-container mb-2 mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm" href="{{ route('password.request') }}">
                       <strong> {{ __('Mot de passe oublié?') }}</strong>
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="ml-10">
                <x-primary-button style="width:15em">
                    {{ __('Connexion') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</section>

  <!-- end contact section -->

 












  




  <div class="bg" style="margin-top: 70px;">

    <!-- about section
    <section class="about_section layout_padding" > -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 offset-md-2">
            <div class="about_detail-box" id="aboute">
              <h3 class="custom_heading ">
                A propos
              </h3>
              <p class="">
              C'est une solution web dédiée à l'Université Abderrahmane Mira de Bejaia, 
              spécifiquement élaborée pour répondre aux besoins de la Faculté des Sciences Exactes.
              Cette plateforme informatique offre un environnement centralisé pour la gestion exhaustive de la scolarité
              des étudiants. En permettant la gestion des Points de Fréquentation et de Conduite (PFC), des conseils disciplinaires et d'autres activités administratives clés, 
              elle assure une coordination efficace des processus internes de l'administration du département
              </p>
              <div>
                <a href="">
                En savoir plus
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="about_img-box">
              <img src="images/4.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- end     section  -->


 



  <!-- info section -->
  <section class="info_section  " id="contact">
    <div class="container w-60 h-10">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
              Route de Targa Ouzemmour 06000 Bejaia.
              </p>
            </div>
          </div>
        </a>
        <a href="">
    <div class="item d-flex align-items-center">
        <div class="img-box box-2 me-2">
            <img src="" alt="">
        </div>
        <div class="detail-box">
            <p class="mb-0">00213 34 81 37 27</p>
        </div>
    </div>
</a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
             dept.informatique@se.univ-bejaia.dz
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>



  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      © 2024 All Rights Reserved By
      <a href="https://html.design/">GndznHtm</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>