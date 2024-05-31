@extends('enseignantcrud.layout')
@section('content')
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
  <div class="card-header  bg-primary"><strong>Ajouter un enseignant</strong></div>
  <div class="card-body">
       
  <form action="{{ url('enseignantuser') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control" required></br>
        <label>Prenom</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control" required></br>
        <label>Date Naissance</label></br>
        <input type="date" name="date_naiss" id="date_naiss" class="form-control"></br>
        <label>Grade</label></br>
        <input type="text" name="grade" id="grade" class="form-control" required></br>
        <label>Diplome</label></br>
        <input type="text" name="diplome" id="diplome" class="form-control" required></br>
        <label>Année de Recrutement</label></br>
        <input type="number" name="annee_rec" id="annee_rec" class="form-control" required></br>
      
        <label for="usertype">Type d'utilisateur</label><br>
        <input type="text" name="usertype" id="usertype" class="form-control" value="enseignant"><br>
    
        <!-- <label for="domaine_exp">Domaine d'expertise</label><br>
        <select name="domaine_exp[]" id="domaine_exp" class="form-control" multiple required>
        <option value=" disabled selected hidden">Sélectionnez une spécialité</option>
        <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
<option value="Génie Logiciel">Génie Logiciel</option>
<option value="Intelligence Artificielle">Intelligence Artificielle</option>
<option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
<option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option> -->
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



        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control" required></br>
        <label>Mot de passe</label></br>
       
<x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
<x-input-error :messages="$errors->get('password')" class="mt-2" /></br>



<div style="text-align: center;">
    <button type="submit" class="btn btn-primary">ajouter</button>
        
    
    
    
    <a href="{{url('admin')}}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a>
        </div>
        </div>

    </form>
    
  </div>
</div>
  
@stop