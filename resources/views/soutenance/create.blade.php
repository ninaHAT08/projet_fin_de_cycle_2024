<x-app-layout>
    @extends('layout')

    <style>
        .card {
            margin: auto;
            width: 70%;
        }
        .form-label {
            margin-top: 1rem;
        }
        .card-body .form-control {
            margin-bottom: 1rem;
        }
        .card-body .row {
            margin-bottom: 1.5rem; /* Espace supplémentaire entre les lignes de champs */
        }
    </style>

    <div class="card my-4">
        <div class="card-header">
            <h3>Création d'une soutenance</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('soutenance.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Ligne pour Session, Date de Soutenance, Note -->
                <div class="row g-3 align-items-center mb-3">
                    
                    <div class="col-auto mt-1">
                        <label for="date_soutenance" class="form-label">Date de Soutenance</label>
                    </div>
                    <div class="col-auto mt-4">
                        <input type="date" class="form-control @error('date_soutenance') is-invalid @enderror" id="date_soutenance" name="date_soutenance" required>
                        @error('date_soutenance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-auto mt-1">
                        <label for="note" class="form-label">Note</label>
                    </div>
                    <div class="col-auto mt-4">
                        <input type="number" class="form-control @error('note') is-invalid @enderror" id="note" name="note" min="0" max="20">
                        @error('note')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Ligne pour Étudiant 1, Étudiant 2 -->
                <!-- <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="etudiant_id" class="form-label">Étudiant</label>
                    </div>
                    <div class="col-auto mt-4">
                        <select class="form-control @error('etudiant_id') is-invalid @enderror" id="etudiant_id" name="etudiant_id" required>
                            @foreach ($etudiants as $etudiant)
                                <option value="{{ $etudiant->id }}">{{ $etudiant->prenom }} {{ $etudiant->nom }}</option>
                            @endforeach
                        </select>
                        @error('etudiant_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-auto mt-1">
                        <label for="etudiant2_id" class="form-label">Étudiant 2 (optionnel)</label>
                    </div>
                    <div class="col-auto mt-4">
                        <select class="form-control @error('etudiant2_id') is-invalid @enderror" id="etudiant2_id" name="etudiant2_id">
                            <option value="">Sélectionner un étudiant</option>
                            @foreach ($etudiants as $etudiant)
                                <option value="{{ $etudiant->id }}">{{ $etudiant->prenom }} {{ $etudiant->nom }}</option>
                            @endforeach
                        </select>
                        @error('etudiant2_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> -->
 <div class="row g-3 align-items-center mb-3">
    <div class="col-auto mt-1">
        <label for="etudiant_id" class="form-label">Étudiant</label>
    </div>
    <div class="col-auto mt-4">
        <select class="form-control @error('etudiant_id') is-invalid @enderror" id="etudiant_id" name="etudiant_id" required>
            @foreach ($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}">{{ $etudiant->prenom }} {{ $etudiant->nom }}</option>
            @endforeach
        </select>
        @error('etudiant_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-auto mt-1">
        <label for="etudiant2_id" class="form-label">Étudiant 2 (optionnel)</label>
    </div>
    <div class="col-auto mt-4">
        <select class="form-control @error('etudiant2_id') is-invalid @enderror" id="etudiant2_id" name="etudiant2_id">
            <option value="">Sélectionner un étudiant</option>
            @foreach ($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}">{{ $etudiant->prenom }} {{ $etudiant->nom }}</option>
            @endforeach
        </select>
        @error('etudiant2_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

                <!-- Ligne pour Président du Jury, Enseignant 1, Enseignant 2, Enseignant 3 -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="president_jury_id" class="form-label">Président du Jury</label>
                    </div>
                    <div class="col-auto mt-4">
                        <select class="form-control @error('president_jury_id') is-invalid @enderror" id="president_jury_id" name="president_jury_id" required>
                        <option value="">Sélectionner un enseignant</option>
                        @foreach ($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                            @endforeach
                        </select>
                        @error('president_jury_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   
                    <div class="col-auto mt-1">
            <label for="enseignant1_id" class="form-label">Encadrant</label>
        </div>
        @php
            $enseignantConnecte = Auth::user();
        @endphp

        <!-- Champ caché pour stocker l'ID de l'enseignant connecté -->
        <input type="hidden" name="enseignant1_id" value="{{ $enseignantConnecte->id }}">

        <!-- Champ désactivé affichant le nom et prénom de l'enseignant connecté -->
        <div class="col-auto mt-4">
            <select class="form-control @error('enseignant1_id') is-invalid @enderror" id="enseignant1_id" name="enseignant1_id" disabled>
                <option value="{{ $enseignantConnecte->id }}">{{ $enseignantConnecte->prenom }} {{ $enseignantConnecte->nom }}</option>
            </select>
            @error('enseignant1_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row g-4 align-items-center mb-3">
        <div class="col-auto mt-1">
                        <label for="enseignant2_id" class="form-label">Examinateur </label>
                    </div>
                    <div class="col-auto mt-4">
                        <select class="form-control @error('enseignant2_id') is-invalid @enderror" id="enseignant2_id" name="enseignant2_id" required>
                        <option value="">Sélectionner un enseignant</option>
                        @foreach ($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                            @endforeach
                        </select>
                        @error('enseignant2_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-auto mt-1">
                        <label for="enseignant3_id" class="form-label">co-encadrant  (optionnel)</label>
                    </div>
                    <div class="col-auto mt-4">
                        <select class="form-control @error('enseignant3_id') is-invalid @enderror" id="enseignant3_id" name="enseignant3_id">
                            <option value="">Sélectionner un enseignant</option>
                            @foreach ($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                            @endforeach
                        </select>
                        @error('enseignant3_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
                    <div class="col-auto mt-1">
                        <label for="memoire" class="form-label">Mémoire</label>
                    </div>
                    <div class="col-auto mt-4">
                        <input type="file" class="form-control @error('memoire') is-invalid @enderror" id="memoire" name="memoire">
                        @error('memoire')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Boutons Soumettre et Annuler -->
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('soutenance.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript pour déterminer automatiquement la session -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateSoutenanceInput = document.getElementById('date_soutenance');
            const sessionSelect = document.getElementById('session');

            const sessionNormaleStart = new Date('{{ $sessionNormale->date_debut ?? '' }}');
            const sessionNormaleEnd = new Date('{{ $sessionNormale->date_fin ?? '' }}');
            const sessionRattrapageStart = new Date('{{ $sessionRattrapage->date_debut ?? '' }}');
            const sessionRattrapageEnd = new Date('{{ $sessionRattrapage->date_fin ?? '' }}');

            dateSoutenanceInput.addEventListener('change', function () {
                const dateSoutenance = new Date(this.value);
                
                if (dateSoutenance >= sessionNormaleStart && dateSoutenance <= sessionNormaleEnd) {
                    sessionSelect.value = 'normale';
                } else if (dateSoutenance >= sessionRattrapageStart && dateSoutenance <= sessionRattrapageEnd) {
                    sessionSelect.value = 'rattrapage';
                } else {
                    sessionSelect.value = '';
                    alert('La date de soutenance n\'est pas dans une période de session valide.');
                }
            });
        });
    </script>
</x-app-layout>