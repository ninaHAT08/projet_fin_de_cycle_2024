<x-app-layout>
    @extends('layout')

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
        <div class="card-header text-center">
            <h3>Ajouter un doctorant</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('doctorant') }}" method="post">
                {!! csrf_field() !!}

                <!-- Ligne pour Nom et Prénom -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                    </div>
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
                </div>

               
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="type_these" class="col-form-label">Type de Thèse</label>
                    </div>
                    <div class="col-auto">
                        <select name="type_these" id="type_these" class="form-control" required>
                            <option value="" disabled selected hidden>Sélectionnez un type</option>
                            <option value="LMD">LMD</option>
                            <option value="Classique">Classique (En sciences)</option>
                        </select>
                    </div>
                    @if ($errors->has('type_these'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('type_these') }}</div>
                    @endif
               
    <div class="col-auto mt-1">
        <label for="diplome_doctorant" class="col-form-label">Diplôme</label>
    </div>
    <div class="col-auto">
        <select name="diplome_doctorant" id="diplome_doctorant" class="form-control" required>
            <option value="" disabled selected hidden>Sélectionnez un diplôme</option>
            <option value="Master">Master</option>
            <option value="Ingéniorat">Ingéniorat</option>
        </select>
    </div>
    @if ($errors->has('diplome_doctorant'))
        <div class="alert alert-danger col-auto">{{ $errors->first('diplome_doctorant') }}</div>
    @endif
</div> -->

                <!-- Ligne pour Année d'inscription et Type d'utilisateur -->
                <div class="row g-3 align-items-center mb-3">
                    <!-- <div class="col-auto mt-1">
                        <label for="annee_ins" class="col-form-label">Année d'inscription</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="annee_ins" id="annee_ins" class="form-control" required>
                    </div> -->

                    <div class="col-auto mt-1">
                        <label for="usertype" class="col-form-label">Type d'utilisateur</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="usertype" id="usertype" class="form-control" value="doctorant" readonly>
                    </div>
                </div>

                <!-- Ligne pour Email et Mot de passe -->
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto mt-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-auto">
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
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
                    <a href="{{ url('doctorant') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>