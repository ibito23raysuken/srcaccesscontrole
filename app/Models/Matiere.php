<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'nom_matiere',
        'jour',
        'heures',
        'enseignant',
    ];
    use HasFactory;
}
