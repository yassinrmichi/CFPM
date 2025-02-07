<?php

namespace App\Http\Controllers\GlobalAdmins;
use App\Http\Controllers\Controller;

use App\Models\Etablissement;
use Illuminate\Http\Request;

class EtablissementsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $validateForm = $request->validate([
                'nom' => 'required|string|unique:etablissements,nom',
                'adresse' => 'required|string',
                'telephone' => 'nullable|string',
                'email' => 'required|email|unique:etablissements,email',
            ]);

            Etablissement::insert([
                'nom' => $validateForm['nom'],
                'adresse' => $validateForm['adresse'],
                'telephone' => $validateForm['telephone'],
                'email' => $validateForm['email'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            return redirect()->back()->with('success', 'Établissement ajouté avec succès.');
        }catch (QueryException $e) {
            $errorMessage = $e->getMessage();
            if (preg_match('/Duplicate entry.*for key \'users_email_unique\'/', $errorMessage)) {
                $errorMessage = 'L\'adresse email est déjà utilisée.';
            }
    }
    }
    public function show(Etablissement $etablissement)
    {
        //
    }

    public function edit(Etablissement $etablissement)
    {
        //
    }

    public function update(Request $request, Etablissement $etablissement)
    {
        //
    }

    public function destroy($id)
{
    $etablissement = Etablissement::findOrFail($id); // Trouver l'établissement ou renvoyer une erreur 404
    $etablissement->delete(); // Supprimer l'établissement

    return response()->json(['message' => 'Établissement supprimé avec succès !']); // Retourner une réponse JSON
}
}
