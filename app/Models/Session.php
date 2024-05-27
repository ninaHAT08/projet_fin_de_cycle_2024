<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table= 'sessions_pfc';
    
    protected   $fillable = ['intitule_session', 'date_debut', 'date_fin', 'annee_univ','iduser'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
