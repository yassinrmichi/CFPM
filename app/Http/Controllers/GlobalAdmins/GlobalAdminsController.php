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
        'name' => 'required|string',
        'prenom' => 'required|string',
        'telephone' => 'nullable|string',
        'adresse' => 'nullable|string',
        'cin' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $globaladmin = new Globaladmin;
    $globaladmin->user_id = $request->user_id;
    $globaladmin->name = $request->name;
    $globaladmin->prenom = $request->prenom;
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
        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->first();

        return view('globalAdmin/editUserToAdmin',compact('Etablissements','globalAdmins'));
    }

    public function updateUserToAdmin(Request $request)
{
    try {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|string|unique:admins,cin', // CIN should be unique
            'email' => 'required|email',
            'role' => 'required|string|in:admin,superAdmin', // Ensure role is either admin or superadmin
            'etablissement' => 'required_if:role,admin|exists:etablissements,id', // Ensure etablissement exists when role is admin
        ]);

        // Récupération de l'utilisateur
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            throw new Exception('Utilisateur non trouvé');
        }

        // Mise à jour du rôle
        $user->update(['role' => $validated['role']]);

        // Si l'utilisateur devient admin
        if ($validated['role'] == 'admin') {
            Admin::create(
                ['user_id' => $user->id], // Assuming the user is unique
                [
                    'name' => $validated['name'],
                    'prenom' => $validated['prenom'],
                    'cin' => $validated['cin'],
                    'etablissement_id' => $validated['etablissement'],
                ]
            );
        }
        // Si l'utilisateur devient superadmin
        elseif ($validated['role'] == 'superAdmin') {
            Superadmin::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'prenom' => $validated['prenom'],
                'cin' => $validated['cin'],
                'etablissement_id' => $validated['etablissement'],
            ]);
        }

        return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès');
    } catch (Exception $e) {
        // Afficher un message d'erreur
        return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage());
    }
}


        public function profile($id)
        {
            $globalAdmins = User::with(['globalAdmin'])->find($id);

            if (!$globalAdmins) {
                abort(404, 'Global Admin non trouvé');
            }

            return view('GlobalAdmin/Profile',['globalAdmins'=>$globalAdmins]);
        }

        public function update(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'nullable|string|max:20',
                'adresse' => 'nullable|string|max:255',
                'cin' => 'nullable|string|max:20',
            ]);

            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Mettre à jour les champs dans la table `user`
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;

            // Mettre à jour les champs dans la table `globalAdmin`
            $user->globalAdmin->telephone = $request->telephone;
            $user->globalAdmin->adresse = $request->adresse;
            $user->globalAdmin->cin = $request->cin;

            // Sauvegarder les modifications
            $user->save();
            $user->globalAdmin->save();

            return response()->json([
                'success' => true,
                'data' => $user,
            ]);
        }
public function GestionEtablissement(){
    $Etablissements = Etablissement::with('superAdmin')->paginate(10);

        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->first();
    return view('GlobalAdmin/GestionEtablissement',compact('Etablissements','globalAdmins'));
}

}





