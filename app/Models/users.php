<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table= 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom','usertype','specialite','email','password'];
    public function sujets(){
        return $this ->hasMany('App\Models\sujets');
       // return $this->hasMany(sujets::class)
 
     }
    
}
