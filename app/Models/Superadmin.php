<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','prenom', 'image', 'etablissement_id', 'telephone', 'adresse', 'cin', 'salaire'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
}

