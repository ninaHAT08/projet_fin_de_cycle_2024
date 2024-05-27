@extends('etudiant.layout')
@section('content')
  
<div class="card" style="margin:20px; ">
  <div class="card-header  bg-primary "  ><strong>  Ajouter un etudiant</strong> </div>
  <div class="card-body">
       
      <form action="{{ url('etudiantuser') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Prenom</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control"></br>
        <label>Date Naissance</label></br>
        <input type="date" name="date_naiss" id="date_naiss" class="form-control"></br>
        <label for="usertype">Type d'utilisateur</label><br>
        <input type="text" name="usertype" id="usertype" class="form-control" value="etudiant"><br>
        <label for="specialite">Specialite</label><br>
        <select name="specialite" id="specialite" class="form-control">
        <option value=" disabled selected hidden">Sélectionnez une spécialité</option>
        <option value="Administration et Sécurité des Réseaux">Administration et Sécurité des Réseaux</option>
<option value="Génie Logiciel">Génie Logiciel</option>
<option value="Intelligence Artificielle">Intelligence Artificielle</option>
<option value="Réseaux et Sécurité">Réseaux et Sécurité</option>
<option value="Systèmes d'Information Avancés">Systèmes d'Information Avancés</option>

    <!-- Ajoutez autant d'options que nécessaire -->
       </select><br>

        <label>matricule</label></br>
        <input type="text" name="matricule" id="matricule" class="form-control"></br>
         
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        <label>Mot de passe</label></br>
       <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
       <x-input-error :messages="$errors->get('password')" class="mt-2" /></br>
       <div style="text-align: center;">
        <button type="submit" class="btn btn-primary">ajouter</button>
        <a href="{{url('admin')}}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a> 
        </div>
    </form>
    
  </div>
</div>
  
@stop