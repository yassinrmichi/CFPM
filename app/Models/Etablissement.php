<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Etablissement extends Model
{
    use HasFactory;
    protected $table = 'etablissements';

    public function users(){
        return $this->hasMany(User::class);
    }
}
