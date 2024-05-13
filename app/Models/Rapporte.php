<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'stagiaire_id',
        'date',
        'contenu',
        'fichiercontenu',
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
