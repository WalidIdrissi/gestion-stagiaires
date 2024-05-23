<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'stagiaire_id',
        'encadrant_id',
        'note_globale',
        'commentaire',
        'date_evaluation',
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'stagiaire_id');
    }

    public function encadrant()
    {
        return $this->belongsTo(Encadrant::class, 'encadrant_id');
    }
}
