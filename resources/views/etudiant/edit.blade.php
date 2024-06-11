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
    <div class="card my-4 d-flex justify">
        <div class="card-header">
            <h3>Modifier le profil</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('etudiantP.update', $etudiant->id) }}">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Ligne pour Nom et Prénom -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $etudiant->nom) }}" required>
                    </div>
                    @if ($errors->has('nom'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('nom') }}</div>
                    @endif

                    <div class="col-auto mt-1">
                        <label for="prenom" class="col-form-label">Prénom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $etudiant->prenom) }}" required>
                    </div>
                    @if ($errors->has('prenom'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('prenom') }}</div>
                    @endif
                </div>

                <!-- Ligne pour Date de Naissance -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="date_naiss" class="col-form-label">Date de Naissance</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ old('date_naiss', $etudiant->date_naiss) }}" required>
                    </div>
                    @if ($errors->has('date_naiss'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('date_naiss') }}</div>
                    @endif
                </div>

                <!-- Ligne pour Matricule et Type d'utilisateur -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="matricule" class="col-form-label">Matricule</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule', $etudiant->matricule) }}" required>
                    </div>
                    @if ($errors->has('matricule'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('matricule') }}</div>
                    @endif
                </div>

                <!-- Ligne pour Spécialité -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="specialite" class="col-form-label">Spécialité</label>
                    </div>
                    <div class="col-auto">
                        <select name="specialite" id="specialite" class="form-control" required>
                            <option value="" disabled selected hidden>Sélectionnez une spécialité</option>
                            <option value="Administration et Sécurité des Réseaux" {{ old('specialite', $etudiant->specialite) == 'Administration et Sécurité des Réseaux' ? 'selected' : '' }}>Administration et Sécurité des Réseaux</option>
                            <option value="Génie Logiciel" {{ old('specialite', $etudiant->specialite) == 'Génie Logiciel' ? 'selected' : '' }}>Génie Logiciel</option>
                            <option value="Intelligence Artificielle" {{ old('specialite', $etudiant->specialite) == 'Intelligence Artificielle' ? 'selected' : '' }}>Intelligence Artificielle</option>
                            <option value="Réseaux et Sécurité" {{ old('specialite', $etudiant->specialite) == 'Réseaux et Sécurité' ? 'selected' : '' }}>Réseaux et Sécurité</option>
                            <option value="Systèmes d'Information Avancés" {{ old('specialite', $etudiant->specialite) == 'Systèmes d\'Information Avancés' ? 'selected' : '' }}>Systèmes d'Information Avancés</option>
                        </select>
                    </div>
                    @if ($errors->has('specialite'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('specialite') }}</div>
                    @endif
                </div>

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">enregistrer les modifications</button>
                    <a href="{{url('dashboard')}}" class="btn btn-secondary">annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>