<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'usertype',
       'specialite',
       'matricule',
       'date_naiss',
       'etat',
       'type_these',
      'annee_ins',
      'grade',
        'diplome',
        'annee_rec',
        'idSujet',
        'poste',
        'domaine_exp',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'etat' => 'boolean',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sujet()
    {
        return $this->belongsTo(Sujet::class, 'idSujet');
    }
     // Relation with Choix (les choix faits par l'étudiant)
     public function choix()
     {
         return $this->hasMany(Choix::class, 'idUser3');
     }
 
}
