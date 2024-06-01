<x-app-layout>
@extends('layout')

<div class="card my-4 ">
    <div class="card-header ">
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

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                    @if ($errors->has('nom'))
                        <div class="alert alert-danger">{{ $errors->first('nom') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
                    @if ($errors->has('prenom'))
                        <div class="alert alert-danger">{{ $errors->first('prenom') }}</div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label for="date_naiss" class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ old('date_naiss') }}" required>
                    @if ($errors->has('date_naiss'))
                        <div class="alert alert-danger">{{ $errors->first('date_naiss') }}</div>
                    @endif
                </div>
            </div>

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


            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label for="date_naiss" class="form-label">Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}" required>
                @if ($errors->has('matricule'))
                    <div class="alert alert-danger">{{ $errors->first('matricule') }}</div>
                @endif
                </div>
            </div>


           
            <!-- Email et Mot de passe -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ url('admin') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>

</x-app-layout>