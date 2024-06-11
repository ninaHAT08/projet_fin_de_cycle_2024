<!-- resources/views/profil/edit.blade.php -->
@extends('etudiant.layout')
@extends('layout')




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Mise à jour du profil') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profil.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $user->nom) }}" required autofocus>
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_naiss" class="col-md-4 col-form-label text-md-right">{{ __('Date de Naissance') }}</label>
                                <div class="col-md-6">
                                    <input id="date_naiss" type="date" class="form-control @error('date_naiss') is-invalid @enderror" name="date_naiss" value="{{ old('date_naiss', $user->date_naiss) }}" required>
                                    @error('date_naiss')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="specialite" class="col-md-4 col-form-label text-md-right">{{ __('Spécialité') }}</label>
                                <div class="col-md-6">
                                    <input id="specialite" type="text" class="form-control @error('specialite') is-invalid @enderror" name="specialite" value="{{ old('specialite', $user->specialite) }}" required>
                                    @error('specialite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="form-group row">
    <label for="specialite" class="col-md-4 col-form-label text-md-right">{{ __('Spécialité') }}</label>
    <div class="col-md-6">
        <select id="specialite" class="form-control @error('specialite') is-invalid @enderror" name="specialite" required>
            <option value="" disabled selected hidden>Sélectionnez une spécialité</option>
            <option value="Administration et Sécurité des Réseaux" {{ old('specialite', $user->specialite) === 'Administration et Sécurité des Réseaux' ? 'selected' : '' }}>Administration et Sécurité des Réseaux</option>
            <option value="Génie Logiciel" {{ old('specialite', $user->specialite) === 'Génie Logiciel' ? 'selected' : '' }}>Génie Logiciel</option>
            <option value="Intelligence Artificielle" {{ old('specialite', $user->specialite) === 'Intelligence Artificielle' ? 'selected' : '' }}>Intelligence Artificielle</option>
            <option value="Réseaux et Sécurité" {{ old('specialite', $user->specialite) === 'Réseaux et Sécurité' ? 'selected' : '' }}>Réseaux et Sécurité</option>
             <option value="Systèmes d\'Information Avancés" {{ old('specialite', $user->specialite) === 'Systèmes d\'Information Avancés' ? 'selected' : '' }}>Systèmes d'Information Avancés</option>
        </select>
        @error('specialite')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="matricule" class="col-md-4 col-form-label text-md-right">{{ __('Matricule') }}</label>
    <div class="col-md-6">
        <input id="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule', $user->matricule) }}" required>
        @error('matricule')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


                            <!-- <div class="form-group row">
                                <label for="matricule" class="col-md-4 col-form-label text-md-right">{{ __('Matricule') }}</label>
                                <div class="col-md-6">
                                    <input id="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule', $user->matricule) }}" required>
                                    @error('matricule')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

