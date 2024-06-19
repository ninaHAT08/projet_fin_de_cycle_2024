<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{
    use HasFactory;

   
    protected $table = 'soutenance';
    protected $casts = [
        'date_soutenance' => 'date',
    ];
    protected $fillable = [
        'session',
        'date_soutenance',
        'memoire',
        'note',
        'etudiant_id',
        'etudiant2_id',
        'president_jury_id',
        'enseignant1_id',
        'enseignant2_id',
        'enseignant3_id',
    ];

    // Relations avec les utilisateurs (étudiants et enseignants)
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    public function etudiant2()
    {
        return $this->belongsTo(User::class, 'etudiant2_id');
    }

    public function presidentJury()
    {
        return $this->belongsTo(User::class, 'president_jury_id');
    }

    public function enseignant1()
    {
        return $this->belongsTo(User::class, 'enseignant1_id');
    }

    public function enseignant2()
    {
        return $this->belongsTo(User::class, 'enseignant2_id');
    }

    public function enseignant3()
    {
        return $this->belongsTo(User::class, 'enseignant3_id');
    }






}
