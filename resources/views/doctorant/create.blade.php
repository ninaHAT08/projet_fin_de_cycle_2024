@extends('enseignantcrud.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header bg-primary">ajouter un doctorant</div>
  <div class="card-body">
       
      <form action="{{ url('doctorant') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Prenom</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control"></br>
        <label>Date Naissance</label></br>
        <input type="date" name="date_naiss" id="date_naiss" class="form-control"></br>
        <label>type these</label></br>
        <input type="text" name="type_these" id="type_these" class="form-control"></br>
        <label>annee inscription</label></br>
        <input type="text" name="annee_ins" id="annee_ins" class="form-control"></br>
        <!-- <label>Type d'utilisateur</label></br>
        <input type="text" name="usertype" id="usertype" class="form-control"></br>-->
        <label for="usertype">Type d'utilisateur</label><br>
        <input type="text" name="usertype" id="usertype" class="form-control" value="doctorant"><br>
     
    <!-- Ajoutez autant d'options que nécessaire -->
</select><br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
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
</div>
  
@stop