@extends('etudiant.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Ajouter un etudiant</div>
  <div class="card-body">
       
      <form action="{{ url('etudiantuser') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Prenom</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control"></br>
        <label>Type d'utilisateur</label></br>
        <input type="text" name="usertype" id="usertype" class="form-control"></br>
        <label>Specialite</label></br>
        <input type="text" name="specialite" id="specialite" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Mot de passe</label></br>
       
       <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
       <x-input-error :messages="$errors->get('password')" class="mt-2" /></br>
       <div style="text-align: center;">
        <input type="submit" value="Enregistre" class="btn btn-success"></br>
        </div>
    </form>
    
  </div>
</div>
  
@stop