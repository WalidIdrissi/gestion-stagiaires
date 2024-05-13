<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet',
        'stagiaire_id',
        'encadrant_id',
        'description',
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }

    public function encadrant()
    {
        return $this->belongsTo(Encadrant::class);
    }
}
