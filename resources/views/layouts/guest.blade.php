<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PFC Informatique</title>
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
        <link href="css/styles.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
<<<<<<< HEAD
                <a href="/">
           <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> 
                
                </a>
=======
            <img src="images/pfcc.png" alt=""  style="width: 180px;height: 50px;">
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
