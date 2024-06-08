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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card" style="margin:20px;">
  <div class="card-header "><h3>Ajouter un enseignant</h3></div>
  <div class="card-body">
       
  <form action="{{ url('enseignantuser') }}" method="post">
        {!! csrf_field() !!}
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
       
        <label>Grade</label></br>
        <input type="text" name="grade" id="grade" class="form-control" required></br>
        <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label for="date_naiss" class="form-label">Diplome</label>
                    <input type="text" name="diplome" id="diplome" class="form-control" required></br>
                   
                </div>
            </div>
        
        
       
    
        <div class="row mb-3">
                <div class="col-md-6">
                    <label  class="form-label">Année de Recrutement</label>
                    <input type="number" name="annee_rec" id="annee_rec" class="form-control" required>
                   
                </div>
                <div class="col-md-6">
                    <label for="usertype" class="form-label">Type d'utilisateur</label>
                    <input type="text" name="usertype" id="usertype" class="form-control" value="enseignant">
                  
                </div>
        </div>

        
   
<label for="domaine_exp">Domaine d'expertise</label><br>
        <select name="domaine_exp" id="domaine_exp" class="form-control">
        <option value=" disabled selected hidden">Sélectionnez une spécialité</option>
        <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
<option value="Génie Logiciel">Génie Logiciel</option>
<option value="Intelligence Artificielle">Intelligence Artificielle</option>
<option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
<option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option>


    <!-- Ajoutez autant d'options que nécessaire -->
</select><br>

           
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


        </div>
        </div>

    </form>
    
  </div>
</div>
  

</x-app-layout>