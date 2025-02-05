<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->get();

       
        return view('GlobalAdmin/EspaceGolbalAdmin', compact('globalAdmins'));
    }
}
