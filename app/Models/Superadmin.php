<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'image', 'establishment_id', 'telephone', 'adresse', 'cin', 'salaire'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

