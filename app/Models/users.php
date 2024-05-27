<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom','usertype','specialite','matricule','date_naiss','etat',
 'type_these','annee_ins','grade', 'diplome', 'annee_rec','idSujet',
  'poste','domaine_exp','email','password',];
  
  
  
  public function sujets(){
       return $this ->hasMany('App\Models\sujets');
       // return $this->hasMany(sujets::class)
      // return $this->hasMany(sujets::class, 'iduser');
 
     }
     public function choixBinome()
     {
         return $this->hasMany(Choix::class, 'binome');
     }
 
     public function choixUser3()
     {
         return $this->hasMany(Choix::class, 'idUser3');
     }
}
