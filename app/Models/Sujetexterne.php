<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujetexterne extends Model
{
    use HasFactory;
    protected $table= 'sujetexterne';
    protected $primaryKey = 'idsujete';
    protected $fillable = ['iduser', 'titre' ,'nom_entreprise','description','mot_clé','état', 'specialite'];
public function user(){
    return $this->belongsTo('App\User');
}



}
