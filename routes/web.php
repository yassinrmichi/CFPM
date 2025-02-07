<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\GlobalAdmins\GlobalAdminsController;
use App\Http\Controllers\GlobalAdmins\EtablissementsController; // ✅ Garde ceci si ton contrôleur est bien dans GlobalAdmins

// Routes publiques
Route::group([], function () {
    Route::get('/', fn() => view('index'));
    Route::get('/user/index', fn() => view('index'))->name('index');
    Route::get('/user/about', fn() => view('about'))->name('about');
    Route::get('/user/Filiere', fn() => view('Filiere'))->name('Filiere');
    Route::get('/user/contact', fn() => view('contact'))->name('contact');
});

// Routes pour l'utilisateur
Route::group([], function () {
    Route::get('/inscription', fn() => view('Inscription'))->name('Inscription');
    Route::get('/connexion', fn() => view('Connexion'))->name('connexion');

    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

// Routes pour les GlobalAdmins
Route::group([], function () { // Supprime `namespace`
    Route::get('/GlobalAdmin/dashboard', [GlobalAdminsController::class, 'index'])->name('GlobalAdmins.EspaceGlobalAdmin');
    Route::get('/global-admins/create', [GlobalAdminsController::class, 'editUserToAdmin'])->name('globalAdmins.editUserToAdmin');
    Route::post('/global-admins/store', [GlobalAdminsController::class, 'updateUserToAdmin'])->name('globalAdmins.updateUserToAdmin');
    Route::post('/globaladmin/store', [GlobalAdminsController::class, 'store'])->name('globaladmin.store');
    Route::get('/globaladmin/create', [GlobalAdminsController::class, 'create'])->name('addGlobalAdmin');
    Route::get('/globaladmin/profile/{id}', [GlobalAdminsController::class, 'profile'])->name('profileGA');
    Route::post('/update-globaladmin', [GlobalAdminsController::class, 'update'])->name('update.globaladmin');
    Route::get('/GestionEtablissement', [GlobalAdminsController::class, 'GestionEtablissement'])->name('globalAdmins.GestionEtablissement');

    // ✅ Correction des routes pour les établissements
    Route::post('/etablissements/store', [EtablissementsController::class, 'store'])->name('etablissements.store');
    Route::delete('/etablissements/{id}', [EtablissementsController::class, 'destroy'])->name('etablissements.destroy');});
