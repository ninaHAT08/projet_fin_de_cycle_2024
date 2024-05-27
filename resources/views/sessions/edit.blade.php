@extends('enseignantcrud.layout')
@section('content')
<div class="container">
    <h1>Modifier la session</h1>
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

    <form action="{{ route('sessions.update', $session->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="intitule_session">Intitulé</label>
            <input type="text" name="intitule_session" class="form-control" value="{{ $session->intitule_session }}">
        </div>

        <div class="mb-3">
            <label for="date_debut">Date Début</label>
            <input type="date" name="date_debut" class="form-control" value="{{ $session->date_debut }}">
        </div>

        <div class="mb-3">
            <label for="date_fin">Date Fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{ $session->date_fin }}">
        </div>

        <div class="mb-3">
            <label for="annee_univ">Année Universitaire</label>
            <input type="text" name="annee_univ" class="form-control" value="{{ $session->annee_univ }}">
        </div>

        <button type="submit" class="btn btn-primary  mt-3">enregistrer</button>
    </form>
</div>
@stop