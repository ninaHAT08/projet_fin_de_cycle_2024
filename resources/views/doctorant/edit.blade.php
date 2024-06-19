<x-app-layout>
@extends('layout')

   
        <div class="container">
            <div class="card my-4">
                <div class="card-header text-center">
                    <h3>Modifier le profil du doctorant</h3>
                </div>
                <div class="card-body">
                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif

                    <form action="{{ route('doctorant.update', ['id' => $doctorant->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Ligne pour Nom et Prénom -->
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto mt-1">
                                <label for="nom" class="col-form-label">Nom</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ $doctorant->nom }}" required>
                            </div>
                            @error('nom')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror

                            <div class="col-auto mt-1">
                                <label for="prenom" class="col-form-label">Prénom</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $doctorant->prenom }}" required>
                            </div>
                            @error('prenom')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ligne pour Date de Naissance -->
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto mt-1">
                                <label for="date_naiss" class="col-form-label">Date de Naissance</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="date_naiss" id="date_naiss" class="form-control" value="{{ $doctorant->date_naiss }}">
                            </div>
                            @error('date_naiss')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror
                        

                       
                            <div class="col-auto mt-1">
                                <label for="type_these" class="col-form-label">Type de Thèse</label>
                            </div>
                            <div class="col-auto">
                                <select name="type_these" id="type_these" class="form-control" required>
                                    <option value="" disabled selected hidden>Sélectionnez un type</option>
                                    <option value="LMD" {{ $doctorant->type_these == 'LMD' ? 'selected' : '' }}>LMD</option>
                                    <option value="Classique" {{ $doctorant->type_these == 'Classique' ? 'selected' : '' }}>Classique (En sciences)</option>
                                </select>
                            </div>
                            @error('type_these')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ligne pour Année d'inscription -->
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto mt-1">
                                <label for="annee_ins" class="col-form-label">Année d'inscription</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="annee_ins" id="annee_ins" class="form-control" value="{{ $doctorant->annee_ins }}" required>
                            </div>
                            @error('annee_ins')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ligne pour Diplôme -->
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto mt-1">
                                <label for="diplome_doctorant" class="col-form-label">Diplôme</label>
                            </div>
                            <div class="col-auto">
                                <select name="diplome_doctorant" id="diplome_doctorant" class="form-control" required>
                                    <option value="" disabled selected hidden>Sélectionnez un diplôme</option>
                                    <option value="Master" {{ $doctorant->diplome_doctorant == 'Master' ? 'selected' : '' }}>Master</option>
                                    <option value="Ingéniorat" {{ $doctorant->diplome_doctorant == 'Ingéniorat' ? 'selected' : '' }}>Ingéniorat</option>
                                </select>
                            </div>
                            @error('diplome_doctorant')
                                <div class="alert alert-danger col-auto">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ligne pour Email -->
                       

                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <a href="{{ url('doctorant') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</x-app-layout>