<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiches extends Model
{
    use HasFactory;
    protected $table= 'fiches';
    protected $primaryKey = 'idfiche';
    protected $fillable = ['iduser', 'idSujets' ];
    public function sujet()
    {
        return $this->belongsTo(sujets::class, 'idSujets');
    }
}
