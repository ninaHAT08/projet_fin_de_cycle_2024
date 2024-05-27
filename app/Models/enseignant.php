<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
    use HasFactory;
    protected $table= 'enseignant';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom' ,'date_naiss','domaine_exp','email',  'diplome','année_rec', 'grade'];
}
