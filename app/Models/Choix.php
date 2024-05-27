<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    use HasFactory;
    protected $table= 'choix';
    protected $primaryKey = 'id';
    protected $fillable = ['binome', 'date', 'idSujet1', 'idUser3','envoyer','ordre'];

    public function binomeUser()
    {
        return $this->belongsTo(User::class, 'binome');
    }

    public function sujet()
    {
        return $this->belongsTo(sujets::class, 'idSujet1');
    }

   
    public function user3()
    {
        return $this->belongsTo(User::class, 'idUser3');
    }

}
