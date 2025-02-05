<?php

namespace App\Http\Controllers\GlobalAdmins;

use App\Http\Controllers\Controller;

use App\Models\GlobalAdmin;
use App\Models\Admin;
use App\Models\Superadmin;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;


class GlobalAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->first();


        return view('GlobalAdmin/EspaceGolbalAdmin', compact('globalAdmins'));

    }

    public function create()
{
    $users = User::all();
    return view('GlobalAdmin/addGlobalAdmin',compact('users'));
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id|unique:globaladmins,user_id',
        'telephone' => 'nullable|string',
        'adresse' => 'nullable|string',
        'cin' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $globaladmin = new Globaladmin;
    $globaladmin->user_id = $request->user_id;
    $globaladmin->telephone = $request->telephone;
    $globaladmin->adresse = $request->adresse;
    $globaladmin->cin = $request->cin;

    if ($request->hasFile('image')) {
        // Vérifie si le fichier a bien été téléchargé
        $image = $request->file('image');
        $path = $image->store('images', 'public'); // Enregistre le fichier

        // Log pour vérifier le chemin
        \Log::info('Image enregistrée dans : ' . $path);

        // Enregistre le chemin de l'image dans la base de données
        $globaladmin->image = $path;
    } else {
        \Log::warning('Aucune image téléchargée');
    }

    $globaladmin->save();

    return redirect()->route('addGlobalAdmin')->with('success', 'Global Admin créé avec succès!');
}



    public function editUserToAdmin()
    {
        $Etablissements = Etablissement::all();
        return view('globalAdmin/editUserToAdmin',compact('Etablissements'));
    }

    public function updateUserToAdmin(Request $request)
{
    try {
        // Validation des données
        $validated = $request->validate([
            'cin' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
            'etablissement' => 'required'
        ]);

        // Récupération de l'utilisateur
        $user = User::where('cin', $validated['cin'])->where('email', $validated['email'])->first();

        if (!$user) {
            throw new Exception('Utilisateur non trouvé');
        }

        // Mise à jour du rôle
        $user->update(['role' => $validated['role']]);

        // Création dans Admin ou Superadmin
        $data = [
            'user_id' => $user->id,
            'cin' => $user->cin,
            'establishment_id' => $validated['etablissement'],
        ];

        if ($validated['role'] == 'admin') {
            Admin::create($data);
        } else {
            Superadmin::create($data);
        }

        return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès');
    } catch (Exception $e) {
        // Afficher un message d'erreur
        return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage());
    }
}

}





