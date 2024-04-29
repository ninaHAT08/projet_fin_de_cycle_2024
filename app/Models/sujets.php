<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sujets extends Model
{
    protected $guarded =[];
    use HasFactory;
    protected $table= 'sujets';
    protected $primaryKey = 'idSujet';
    protected $fillable = ['iduser', 'titre' ,'description','mot_clé','état', 'specialite'];
public function user(){
   //ss return $this->belongsTo('App\Models\User');
    return $this->belongsTo(User::class, 'iduser');
}



}
