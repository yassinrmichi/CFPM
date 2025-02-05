<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalAdmin extends Model
{
    use HasFactory;

    protected $table = 'globaladmins';

    protected $fillable = ['user_id', 'image', 'telephone', 'adresse', 'cin', 'salaire'];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    


}
