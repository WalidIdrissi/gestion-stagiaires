<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'ville',
        'email',
        'telephone',
        'ecole',
        'demande_stage',
        'attestation_assurance',
        'photo',
        'cv',
        'formateur',
        'date_debut',
        'date_fin',
        'statut',
    ];
}
