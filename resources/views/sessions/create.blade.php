<x-app-layout>
    @extends('layout')
    <div class="container">
        <h1>Créer une nouvelle Session</h1>
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
        <form action="{{ route('sessions.store') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="intitule_session" class="form-label">Intitulé de la Session</label>
                <input type="text" class="form-control" id="intitule_session" name="intitule_session" required>
            </div>
            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de Début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>
            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
            </div>
            <div class="mb-3">
                <label for="annee_univ" class="form-label">Année Universitaire</label>
                <input type="text" class="form-control" id="annee_univ" name="annee_univ" required>
            </div>
           
            <a href="  {{ route('sessions.index') }}" class="btn btn-secondary">Annuler</a>
          
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
    </x-app-layout> 
