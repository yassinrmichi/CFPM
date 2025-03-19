<?php


namespace App\Http\Controllers\GlobalAdmins;
use App\Http\Controllers\Controller;

use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function create(){
        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->first();
        return view('GlobalAdmin/G_Filiere/Ajouter_Filiere', compact('globalAdmins'));
     }

     public function gestion(){
        $user = Auth::user();

        // Utiliser la méthode with() pour charger la relation globalAdmin
        $globalAdmins = User::with('globalAdmin') // Charge la relation globalAdmin
                            ->where('id', $user->id) // Optionnel, si tu veux l'utilisateur connecté
                            ->first();
        return view('GlobalAdmin/G_Filiere/GestionFiliere', compact('globalAdmins'));
     }
    public function index()
    {
        $filieres = Filiere::all();
        return view('Filiere',compact('filieres'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try{ $validateForm = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|integer',
            'niveau_scolaire' => 'required|in:TS,T,Q,S',
            'Logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filiere = new Filiere();
        $filiere->nom = $validateForm['nom'];
        $filiere->description = $validateForm['description'];
        $filiere->duree = $validateForm['duree'];
        $filiere->niveau_scolaire = $validateForm['niveau_scolaire'];

        if ($request->hasFile('Logo')) {
            // Vérifie si le fichier a bien été téléchargé
            $Logo = $request->file('Logo');
            $path = $Logo->store('images', 'public'); // Enregistre le fichier

            // Log pour vérifier le chemin
            \Log::info('Image enregistrée dans : ' . $path);

            // Enregistre le chemin de l'image dans la base de données
            $filiere->Logo = $path;
        } else {
            \Log::warning('Aucune image téléchargée');
        }
        $filiere->save();


        return redirect()->back()->with('success', 'Filière ajoutée avec succès');
    }catch(\Exception $e){
        dd($e->getMessage()); // Affiche l'erreur exacte
        return redirect()->back()->with('error', 'Erreur lors de l\'ajout de la filière');
    }



    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        //
    }
}
