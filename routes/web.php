<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\GlobalAdmins\GlobalAdminsController;



Route::group([], function(){

    Route::get('/', function () {
        return view('index');
    });
    Route::get('/user/index', function () { return view('index');})->name('index');
    Route::get('/user/about',function(){
        return view('about');
    })->name('about');
    Route::get('/user/Filiere',function(){
        return view('Filiere');
    })->name('Filiere');
    Route::get('/user/contact',function(){
        return view('contact');
    })->name('contact');




});
route::group(['namespace'=>'user'],function(){
 // Route pour l'inscription
Route::get('/inscription', function () {
    return view('Inscription');
})->name('Inscription');

// Route pour afficher le formulaire de connexion
Route::get('/connexion', function () {
    return view('Connexion');
})->name('connexion');


Route::post('/user/store', [UserController::class, 'store'])->name('user.store');


Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/profile/{id}',[UserController::class,'profile'])->name('profile');




});

Route::group(['namespace' => 'GlobalAdmins'], function () {
    Route::get('/GlobalAdmin/dashboard', [GlobalAdminsController::class, 'index'])->name('GlobalAdmins.EspaceGlobalAdmin');
Route::get('/global-admins/create', [GlobalAdminsController::class, 'editUserToAdmin'])->name('globalAdmins.editUserToAdmin');
Route::post('/global-admins/store', [GlobalAdminsController::class, 'updateUserToAdmin'])->name('globalAdmins.updateUserToAdmin');
Route::post('/globaladmin/store', [GlobalAdminsController::class, 'store'])->name('globaladmin.store');
Route::get('/globaladmin/create', [GlobalAdminsController::class, 'create'])->name('addGlobalAdmin');


});


// Route::group(['namespace'=>'user'],function(){
//       Route::get('\');
// });
