<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur',
        'description',
        'quantite',
        'date_publication',
        'image',
        'categorie_id',
        'disponible',
    ];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

