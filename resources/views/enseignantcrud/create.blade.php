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