<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'duree', 'niveau_scolaire','Logo'];

    protected $casts = [
        'niveau_scolaire' => 'string',
    ];

    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, 'etablissement_filiere');
    }
    public function images()
{
    return $this->hasMany(FiliereImage::class);
}

}

