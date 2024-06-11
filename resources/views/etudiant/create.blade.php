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
            <h3>Ajouter un étudiant</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('etudiantuser') }}" method="post">
                {!! csrf_field() !!}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<<<<<<< HEAD
                <!-- Ligne pour Nom et Prénom -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col-auto ">
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                    </div>
=======
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

<<<<<<< HEAD
            <!-- <label>Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            @if ($errors->has('nom'))
                <div class="alert alert-danger">{{ $errors->first('nom') }}</div>
            @endif
            <br>
=======
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
                    @if ($errors->has('nom'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('nom') }}</div>
                    @endif

                    <div class="col-auto mt-1">
                        <label for="prenom" class="col-form-label">Prénom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
                    </div>
                    @if ($errors->has('prenom'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('prenom') }}</div>
                    @endif
                </div>
<<<<<<< HEAD
=======
            </div>
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d
>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27

                <!-- Ligne pour Date de Naissance -->
                <!-- <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="date_naiss" class="col-form-label">Date de Naissance</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ old('date_naiss') }}" required>
                    </div>
                    @if ($errors->has('date_naiss'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('date_naiss') }}</div>
                    @endif
                </div> -->

                <!-- Ligne pour Matricule et Type d'utilisateur -->
                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="matricule" class="col-form-label">Matricule</label>
                    </div>
                    <div class="col-auto ">
                        <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}" required>
                    </div>
                    @if ($errors->has('matricule'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('matricule') }}</div>
                    @endif

                    <div class="col-auto mt-1">
                        <label for="usertype" class="col-form-label">Type d'utilisateur</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="usertype" id="usertype" class="form-control" value="etudiant" readonly>
                    </div>
                </div>

                <!-- Ligne pour Spécialité -->
                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="specialite" class="col-form-label">Spécialité</label>
                    </div>
                    <div class="col-auto">
                        <select name="specialite" id="specialite" class="form-control" required>
                            <option value="" disabled selected hidden>Sélectionnez une spécialité</option>
                            <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
                            <option value="Génie Logiciel">Génie Logiciel</option>
                            <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                            <option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
                            <option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option>
                        </select>
                    </div>
                    @if ($errors->has('specialite'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('specialite') }}</div>
                    @endif
                </div>

<<<<<<< HEAD
                <!-- Ligne pour Email et Mot de passe -->
                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-auto">
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
=======
            <div class="mb-3">
                <label for="usertype" class="form-label">Type d'utilisateur</label>
                <input type="text" name="usertype" id="usertype" class="form-control" value="etudiant" readonly>
                @if ($errors->has('usertype'))
                    <div class="alert alert-danger">{{ $errors->first('usertype') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="specialite" class="form-label">Spécialité</label>
                <select name="specialite" id="specialite" class="form-control">
                    <option value="" disabled selected hidden>Sélectionnez une spécialité</option>
                    <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
                    <option value="Génie Logiciel">Génie Logiciel</option>
                    <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                    <option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
                    <option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option>
                </select>
                @if ($errors->has('specialite'))
                    <div class="alert alert-danger">{{ $errors->first('specialite') }}</div>
                @endif
            </div>


<<<<<<< HEAD
            <label>Matricule</label>
            <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}" required>
            @if ($errors->has('matricule'))
                <div class="alert alert-danger">{{ $errors->first('matricule') }}</div>
            @endif
            <br> -->
=======
            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label for="date_naiss" class="form-label">Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}" required>
                @if ($errors->has('matricule'))
                    <div class="alert alert-danger">{{ $errors->first('matricule') }}</div>
                @endif
                </div>
            </div>
>>>>>>> 6f0ae8ae2bbdaf68754483a57a1618dec30d531d


           
            <!-- Email et Mot de passe -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
>>>>>>> 5b54ef798732f5a5d27919a4f65c271890d62f27
                    @if ($errors->has('email'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('email') }}</div>
                    @endif

                    <div class="col-auto mt-1">
                        <label for="password" class="col-form-label">Mot de passe</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('etudiant.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>