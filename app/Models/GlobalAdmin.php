<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalAdmin extends Model
{
    use HasFactory;

    protected $table = 'globaladmins';

    protected $fillable = [
        'user_id',
        'name',
        'prenom',
        'cin',
        'image',
        'telephone',
        'adresse',
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
