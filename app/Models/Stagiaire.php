<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'demande_id',
    ];
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function getNomCompletAttribute()
    {
        return $this->demande->nom . ' ' . $this->demande->prenom;
    }

}
