<x-app-layout>
@extends('layout')



    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter un nouveau sujet</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('sujetss.store') }}" method="POST">
                    @csrf
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
                        <div class="col-sm-4">
                            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" placeholder="Titre" value="{{ old('titre') }}" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <select name="specialite" id="specialite" class="form-control @error('specialite') is-invalid @enderror" required>
                                <option value="">Sélectionnez une spécialité</option>
                                <option value="Administration et Sécurité des Réseaux" {{ old('specialite') == 'Administration et Sécurité des Réseaux' ? 'selected' : '' }}>Administration et Sécurité des Réseaux</option>
                                <option value="Génie Logiciel" {{ old('specialite') == 'Génie Logiciel' ? 'selected' : '' }}>Génie Logiciel</option>
                                <option value="Intelligence Artificielle" {{ old('specialite') == 'Intelligence Artificielle' ? 'selected' : '' }}>Intelligence Artificielle</option>
                                <option value="Réseaux et Sécurité" {{ old('specialite') == 'Réseaux et Sécurité' ? 'selected' : '' }}>Réseaux et Sécurité</option>
                                <option value="Systèmes d'Information Avancés" {{ old('specialite') == 'Systèmes d\'Information Avancés' ? 'selected' : '' }}>Systèmes d'Information Avancés</option>
                            </select>
                            @error('specialite')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="mot_cle" id="mot_cle" class="form-control @error('mot_cle') is-invalid @enderror" placeholder="Mot clé" value="{{ old('mot_cle') }}" required>
                            @error('mot_cle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description de sujet..." rows="9" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <input type="text" name="anneeUniv" id="anneeUniv" class="form-control @error('anneeUniv') is-invalid @enderror" placeholder="Année universitaire" value="{{ old('anneeUniv') }}" required>
                            @error('anneeUniv')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                   
                    <input type="hidden" name="typeSujet" value="externe">
                    <div class="col-sm-4">
                        <input type="text" name="nomEntreprise" id="nomEntreprise" class="form-control @error('nomEntreprise') is-invalid @enderror" placeholder="Nom de l'entreprise" required>
                    </div>

                    <div class="col-sm-4">
                        <input type="text" name="maitre_du_stage" id="maitre_du_stage" class="form-control @error('maitre_du_stage') is-invalid @enderror" placeholder="Maître du stage" required>
                    </div>
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                       
                        <a href="{{ url('dashboard') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>