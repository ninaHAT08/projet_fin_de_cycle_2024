<x-app-layout>
    @extends('layout')
    <style>
        .card {
            margin: auto;
            width: 80%;
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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card center" style="margin:20px;">
        <div class="card-header"><h3>Modifier le profil</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('enseignantP.update', $enseignant->id) }}">
                @csrf
                @method('PUT')

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ $enseignant->nom }}" required>
                    </div>
                    @error('nom')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror

                    <div class="col-auto mt-1">
                        <label for="prenom" class="col-form-label">Prénom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $enseignant->prenom }}" required>
                    </div>
                    @error('prenom')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror

                    <div class="col-auto mt-1">
                        <label for="date_naiss" class="col-form-label">Date de Naissance</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ $enseignant->date_naiss }}"required >
                    </div>
                    @error('date_naiss')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="grade" class="col-form-label">Grade</label>
                    </div>
                    <div class="col-auto">
                        <select name="grade" id="grade" class="form-control" required>
                            <option value="MAB" {{ $enseignant->grade == 'MAB' ? 'selected' : '' }}>Maitre Assistant Classe B</option>
                            <option value="MAA" {{ $enseignant->grade == 'MAA' ? 'selected' : '' }}>Maitre Assistant Classe A</option>
                            <option value="MCB" {{ $enseignant->grade == 'MCB' ? 'selected' : '' }}>Maitre de Conférences Classe B</option>
                            <option value="MCA" {{ $enseignant->grade == 'MCA' ? 'selected' : '' }}>Maitre de Conférences Classe A</option>
                            <option value="PR" {{ $enseignant->grade == 'PR' ? 'selected' : '' }}>Professeur</option>
                        </select>
                    </div>
                    @error('grade')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror

                    <div class="col-auto mt-1">
                        <label for="diplome" class="col-form-label">Diplome</label>
                    </div>
                    <div class="col-auto">
                        <select name="diplome" id="diplome" class="form-control" required>
                            <option value="Magistère" {{ $enseignant->diplome == 'Magistère' ? 'selected' : '' }}>Magistère</option>
                            <option value="Doctorat" {{ $enseignant->diplome == 'Doctorat' ? 'selected' : '' }}>Doctorat</option>
                        </select>
                    </div>
                    @error('diplome')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="annee_rec" class="col-form-label">Année de Recrutement</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="annee_rec" id="annee_rec" class="form-control" value="{{ $enseignant->annee_rec }}" required>
                    </div>

                    <div class="col-auto mt-1">
                        <label for="domaine_exp" class="col-form-label">Domaine d'expertise</label>
                    </div>
                    <div class="col-auto">
                        <select name="domaine_exp" id="domaine_exp" class="form-control" required>
                            <option value="Administration et Sécurité des Réseaux" {{ $enseignant->domaine_exp == 'Administration et Sécurité des Réseaux' ? 'selected' : '' }}>Administration et Sécurité des Réseaux</option>
                            <option value="Génie Logiciel" {{ $enseignant->domaine_exp == 'Génie Logiciel' ? 'selected' : '' }}>Génie Logiciel</option>
                            <option value="Intelligence Artificielle" {{ $enseignant->domaine_exp == 'Intelligence Artificielle' ? 'selected' : '' }}>Intelligence Artificielle</option>
                            <option value="Réseaux et Sécurité" {{ $enseignant->domaine_exp == 'Réseaux et Sécurité' ? 'selected' : '' }}>Réseaux et Sécurité</option>
                            <option value="Systèmes d'Information Avancés" {{ $enseignant->domaine_exp == 'Systèmes d\'Information Avancés' ? 'selected' : '' }}>Systèmes d'Information Avancés</option>
                       
                        </select>
                    </div>
                    @error('domaine_exp')
                        <div class="alert alert-danger col-auto">{{ $message }}</div>
                    @enderror
                </div>

               

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="{{ url('enseignant') }}" class="btn btn-secondary">annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>