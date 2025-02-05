<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\GlobalAdmin;

class UserController extends Controller
{
    function store(Request $request){
try{
    $validateForm = $request->validate([
        'name' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email',
        'cin' => 'required',
        'password' => 'required|min:8',]);
    $validateForm['password'] = Hash::make($validateForm['password']);
    User::create($validateForm);
    return  redirect()->route('index');
} catch (QueryException $e) {
    $errorMessage = $e->getMessage();
    if (preg_match('/Duplicate entry.*for key \'users_email_unique\'/', $errorMessage)) {
        $errorMessage = 'L\'adresse email est déjà utilisée.';
    }
    return back()->withErrors(['errors' => $errorMessage])->withInput();
}
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return  redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Déconnecter l'utilisateur

    // Invalider la session actuelle et régénérer le token CSRF
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Rediriger vers la page de connexion ou d'accueil
    return redirect()->route('index')->with('status', 'Vous avez été déconnecté avec succès.');
}


public function profile($id)
{
    $user = User::with(['globalAdmin', 'admin', 'superAdmin','etablissement'])->find($id);

    if (!$user) {
        abort(404, 'Utilisateur non trouvé');
    }

    return view('Profile',['user'=>$user]);
}






}
