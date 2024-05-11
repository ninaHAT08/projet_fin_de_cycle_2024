<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionPFC extends Model
{
    use HasFactory;
    protected $table= 'session_pfc';
    
    protected   $fillable = ['intitulé_session', 'date_debut', 'date_fin', 'nbr_session', 'iduser'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
