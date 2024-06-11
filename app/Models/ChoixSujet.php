<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoixSujet extends Model
{
    use HasFactory;
    protected $table = 'choix_sujets';

    protected $fillable = [
        'id_enseignant',
        'id_sujetE',
    ];

    public function enseignant()
    {
        return $this->belongsTo(User::class, 'id_enseignant');
    }

    public function sujet()
    {
        return $this->belongsTo(Sujet::class, 'id_sujetE');
    }


}
