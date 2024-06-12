<x-app-layout>
    <div class="container">
        <h1>Enseignants ayant choisi vos sujets externes</h1>
        @foreach($sujets as $sujet)
            <h2>{{ $sujet->titre }}</h2>
            <p>Description : {{ $sujet->description }}</p>
            <p>Spécialité : {{ $sujet->specialite }}</p>
            <p>Mot clé : {{ $sujet->mot_cle }}</p>
            <p>Année universitaire : {{ $sujet->anneeUniv }}</p>
            <p>Nom de l'entreprise : {{ $sujet->nomEntreprise }}</p>
            <p>Maître du stage : {{ $sujet->maitre_du_stage }}</p>

            <h3>Enseignants ayant choisi ce sujet :</h3>
            <ul>
                @foreach($sujet->choixSujets as $choix)
                    <li>{{ $choix->enseignant->name }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
</x-app-layout>