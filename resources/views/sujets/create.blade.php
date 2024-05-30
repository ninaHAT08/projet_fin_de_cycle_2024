@extends('layout')

@section('content')

<div class="container" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header bg-primary text-white">ajouter un nouveau sujet</div>
        <div class="card-body">
            <form action="{{ route('sujets.store') }}" method="POST">
                @csrf
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
                </div>
                <input type="hidden" name="typeSujet" value="interne">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label class="checkbox">
                            <input type="checkbox" id="autre" name="autre"> Ajouter un co-encadrant
                        </label>
                        <div id="autreForm" style="display: none;">
                            <label for="co_encadrant">Co-encadrant (doctorant):</label>
                            <select name="co_encadrant" id="co_encadrant" class="form-control">
                                <option value="">Sélectionnez un co-encadrant (facultatif)</option>
                                @foreach ($doctorants as $doctorant)
                                    <option value="{{ $doctorant->id }}" {{ old('co_encadrant') == $doctorant->id ? 'selected' : '' }}>{{ $doctorant->nom }} {{ $doctorant->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="ajouter" class="btn btn-primary">
               
                    <a href="{{url('enseignant')}}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  // Utilisation de JavaScript pour afficher/masquer le formulaire du co-encadrant en fonction de la case à cocher.
    document.getElementById('autre').addEventListener('change', function() {
        var autreForm = document.getElementById('autreForm');
        autreForm.style.display = this.checked ? 'block' : 'none';
    });
</script>
@endsection