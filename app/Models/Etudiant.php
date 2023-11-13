<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'ref_qrcode',
        'imagepath',
        'datedenaissance',
        'lieudenaissance',
        'parcoure',
        'Anneedetude'
    ];
    use HasFactory;
}
