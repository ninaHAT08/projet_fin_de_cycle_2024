<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;
   
    
    // The guarded property is used to protect attributes from mass assignment.
    // An empty array means all attributes are mass assignable.
    protected $guarded = [];

    // Table name
    protected $table = 'Sujet';

    // Primary key
    protected $primaryKey = 'idSujet';

    // Fillable fields
    protected $fillable = [
        'titre',
        'description',
        'specialite',
        'mot_cle',  // Renommé pour éviter les caractères spéciaux
        'sujet_affecter',  // Renommé pour suivre les conventions
        'annee_univ',  // Renommé pour suivre les conventions
        'iduser1',
        'iduser2',
        'typeSujet',  // Renommé pour suivre les conventions
        'nomEntreprise',  // Renommé pour suivre les conventions
        'maitre_du_stage',
        'publier',
    ];

    // Relation to the user who created the subject
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relation to the first user associated with the subject
    public function user1()
    {
        return $this->belongsTo(User::class, 'iduser1');
    }

    // Relation to the second user associated with the subject
    public function user2()
    {
        return $this->belongsTo(User::class, 'iduser2');
    }
    public function choix()
    {
        return $this->hasMany(Choix::class, 'idSujet1');
    }

    public function choixSujets()
    {
        return $this->hasMany(ChoixSujet::class, 'id_sujetE');
    }


}
