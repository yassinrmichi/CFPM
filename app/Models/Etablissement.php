<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Superadmin;

class Etablissement extends Model
{
    use HasFactory;
    protected $table = 'etablissements';
    protected $fillable = ['nom', 'adresse', 'telephone', 'email'];


    public function users(){
        return $this->hasMany(User::class);
    }
    public function superAdmin(){
        return $this->hasOne(Superadmin::class);
    }
}
