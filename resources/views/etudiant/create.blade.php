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
        <label>Type d'utilisateur</label></br>
        <input type="text" name="usertype" id="usertype" class="form-control"></br>
        <label>Specialite</label></br>
        <input type="text" name="specialite" id="specialite" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        <label>Mot de passe</label></br>
       
       <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
       <x-input-error :messages="$errors->get('password')" class="mt-2" /></br>
       <div style="text-align: center;">
        <button type="submit" class="btn btn-primary">ajouter</button>
        <a href="{{ route('enseignantt.index') }}" class="nav-link btn-retour"><button type="button" class="btn btn-primary">retour</button></a> 
        </div>
    </form>
    
  </div>
</div>
  
@stop