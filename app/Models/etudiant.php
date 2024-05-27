<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $table= 'etudiant';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom' ,'date_naiss','matricule','email','specialite'];
}
