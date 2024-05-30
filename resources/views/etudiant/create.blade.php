@extends('etudiant.layout')
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

<div class="card" style="margin:20px;">
    <div class="card-header bg-primary">
        <strong>Ajouter un étudiant</strong>
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

            <label>Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            @if ($errors->has('nom'))
                <div class="alert alert-danger">{{ $errors->first('nom') }}</div>
            @endif
            <br>

            <label>Prenom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
            @if ($errors->has('prenom'))
                <div class="alert alert-danger">{{ $errors->first('prenom') }}</div>
            @endif
            <br>

            <label>Date Naissance</label>
            <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ old('date_naiss') }}" required>
            @if ($errors->has('date_naiss'))
                <div class="alert alert-danger">{{ $errors->first('date_naiss') }}</div>
            @endif
            <br>

            <label for="usertype">Type d'utilisateur</label>
            <input type="text" name="usertype" id="usertype" class="form-control" value="etudiant" readonly>
            @if ($errors->has('usertype'))
                <div class="alert alert-danger">{{ $errors->first('usertype') }}</div>
            @endif
            <br>

            <label for="specialite">Spécialité</label>
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
            <br>

            <label>Matricule</label>
            <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}" required>
            @if ($errors->has('matricule'))
                <div class="alert alert-danger">{{ $errors->first('matricule') }}</div>
            @endif
            <br>

            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            <br>

            <label>Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
            <br>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ url('admin') }}" class="nav-link btn-retour">
                    <button type="button" class="btn btn-primary">Retour</button>
                </a>
            </div>
        </form>
    </div>
</div>