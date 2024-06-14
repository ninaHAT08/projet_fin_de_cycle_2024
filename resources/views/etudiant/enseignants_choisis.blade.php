<x-app-layout>
    @extends('layout')

    <style>
        .congratulations-card {
            border: 2px solid #28a745;
            border-radius: 10px;
            padding: 50px;
            background-color: #e6ffee;
            color: #155724;
            margin: 20px;
            max-width: 600px;
            text-align: center;
            justify-content: center;
        }

        .congratulations-card h2 {
            color:#058FB2;
            font-size: 2.5em;
        }

        .congratulations-card h3 {
            color: #058FB2;
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
            height: 100vh;
        }

        .teacher-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #d4edda;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            color: #155724;
        }

        .teacher-info li {
            list-style: none;
            padding: 0 10px;
        }

        .teacher-info .name {
            font-weight: bold;
        }
    </style>

    <div id="layoutSidenav_center">
        <div id="layoutSidenav_nav mb-3">
            <div class="center-div">
                <div class="congratulations-card">
                    @foreach($sujets as $sujet)
                       
                    <h2> votre sujet a été choisi !! </h2>
                   <p><strong>Titre : </strong>{{ $sujet->titre }}</p> 
                   
                        <p><strong>Année universitaire:</strong> {{ $sujet->anneeUniv }}</p>
                        <p><strong>Nom de l'entreprise:</strong> {{ $sujet->nomEntreprise }}</p>
                        <p><strong>Maître du stage:</strong> {{ $sujet->maitre_du_stage }}</p>

                        <h3>Enseignants ayant choisi ce sujet:</h3>
                        <ul>
                            @foreach($sujet->choixSujets as $choix)
                                <li class="teacher-info">
                                    <span class="name">{{ $choix->enseignant->nom }} {{ $choix->enseignant->prenom }}</span>
                                    <span class="email">{{ $choix->enseignant->email }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>