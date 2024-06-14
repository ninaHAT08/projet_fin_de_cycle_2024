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
    <div class="card" style="margin:20px;">
        <div class="card-header bg-primary text-white">  <h5>mettre à jour le sujet</h5></div>
        <div class="card-body">
            <div class="container">
              
                <form action="{{ route('sujets.update', $sujet->idSujet) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre du sujet</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $sujet->titre) }}" class="form-control @error('titre') is-invalid @enderror">
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du sujet</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $sujet->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mot_cle" class="form-label">Mot clé du sujet</label>
                        <input type="text" name="mot_cle" id="mot_cle" value="{{ old('mot_cle', $sujet->mot_cle) }}" class="form-control @error('mot_cle') is-invalid @enderror">
                        @error('mot_cle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="specialite" class="form-label">Spécialité concernée du sujet</label>
                        <input type="text" name="specialite" id="specialite" value="{{ old('specialite', $sujet->specialite) }}" class="form-control @error('specialite') is-invalid @enderror">
                        @error('specialite')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="anneeUniv" class="form-label">Année universitaire</label>
                        <input type="text" name="anneeUniv" id="anneeUniv" value="{{ old('anneeUniv', $sujet->anneeUniv) }}" class="form-control @error('anneeUniv') is-invalid @enderror">
                        @error('anneeUniv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="co_encadrant" class="form-label">Co-encadrant</label>
                        <select name="co_encadrant" id="co_encadrant" class="form-control @error('co_encadrant') is-invalid @enderror">
                            <option value="">Choisir un co-encadrant</option>
                            @foreach($doctorants as $doctorant)
                                <option value="{{ $doctorant->id }}" {{ old('co_encadrant', $sujet->iduser2) == $doctorant->id ? 'selected' : '' }}>
                                    {{ $doctorant->nom }} {{ $doctorant->prenom }}
                                </option>
                            @endforeach
                        </select>
                        @error('co_encadrant')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <input type="submit" value="enregistrer" class="btn btn btn-primary bg-primary">
              
                  <a href="{{ url('enseignant') }}" class="btn btn-secondary">annuler</a>
                </div>
                </form>
            </div>
        </div>
    </div>
   
</x-app-layout>