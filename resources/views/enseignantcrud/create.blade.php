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
        <div class="card-header"><h3>Ajouter un enseignant</h3></div>
        <div class="card-body">
            <form action="{{ url('enseignantuser') }}" method="post">
                {!! csrf_field() !!}
              
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
               
                    <!-- <div class="col-auto mt-1">
                        <label for="date_naiss" class="col-form-label">Date de Naissance</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ old('date_naiss') }}" >
                    </div> -->
                   
                </div>


                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="grade" class="col-form-label">Grade</label>
                    </div>
                    <div class="col-auto">
                        <select name="grade" id="grade" class="form-control" required>
                            <option value="" disabled selected hidden>Sélectionnez un grade</option>
                            <option value="MAB">Maitre Assistant Classe B</option>
                            <option value="MAA">Maitre Assistant Classe A</option>
                            <option value="MCB">Maitre de Conférences Classe B</option>
                            <option value="MCA">Maitre de Conférences Classe A</option>
                            <option value="PR">Professeur</option>
                        </select>
                    </div>
                    @if ($errors->has('grade'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('grade') }}</div>
                    @endif
         
                    <div class="col-auto mt-1">
                        <label for="diplome" class="col-form-label ">Diplome</label>
                    </div>
                    <div class="col-auto">
                        <select name="diplome" id="diplome" class="form-control " required>
                        <option value="" disabled selected hidden>Sélectionnez un Diplome  </option>
                            <option value="Magistère">Magistère</option>
                            <option value="Doctorat">Doctorat</option>
                        </select>
                    </div>
                    @if ($errors->has('diplome'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('diplome') }}</div>
                    @endif
                </div>

                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="annee_rec" class="col-form-label">Année de Recrutement</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="annee_rec" id="annee_rec" class="form-control" required>
                    </div>
               
                    <div class="col-auto mt-1">
                        <label for="usertype" class="col-form-label">Type d'utilisateur</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="usertype" id="usertype" class="form-control" value="enseignant" readonly>
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">
                <div class="col-auto mt-1">
                        <label for="domaine_exp" class="col-form-label">Domaine d'expertise</label>
                    </div>
                    <div class="col-auto">
                        <select name="domaine_exp" id="domaine_exp" class="form-control">
                            <option value="" disabled selected hidden>Sélectionnez une spécialité</option>
                            <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
                            <option value="Génie Logiciel">Génie Logiciel</option>
                            <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                            <option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
                            <option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option>
                        </select>
                    </div>
                    @if ($errors->has('domaine_exp'))
                        <div class="alert alert-danger col-auto">{{ $errors->first('domaine_exp') }}</div>
                    @endif
                </div>

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

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('enseignantt.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>