<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\FavorisController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//dashboard


Route::get('/accueil',[AuthController::class,'accueil']);
Route::get('/addrecette',[RecetteController::class,'addrecette']);
Route::get('/myrecette',[RecetteController::class,'myrecette']);
Route::get('/recherche',[RecetteController::class,'search']);
Route::post('/recherche',[RecetteController::class,'recherche'])->name('recherche');
Route::get('/RecettesAccueil',[RecetteController::class,'RecettesAccueil']);
Route::post('/ajoutrecette',[RecetteController::class,'ajoutrecette'])->name('ajoutrecette');
Route::get('/cnx',[AuthController::class,'login']);
Route::get('/decocnx',[AuthController::class,'logout']);
Route::get('/inscrit',[AuthController::class,'registration']);
Route::post('/register',[AuthController::class,'inscription'])->name('register');
Route::post('/login',[AuthController::class,'connexion'])->name('login');
Route::get('/profile',[ProfileController::class,'profile']);
Route::post('/update',[ProfileController::class,'update'])->name('update');

//favoris
Route::post('/addfavoris',[FavorisController::class,'addfavoris'])->name('addfavoris');

//recettes
Route::get('/details',[RecetteController::class,'details']);
Route::get('/edit',[RecetteController::class,'edit']);
Route::post('/modifier',[RecetteController::class,'modifier'])->name('modifier');
Route::get('/supprimer{id}',[RecetteController::class,'supprimer']);
//favoris
Route::get('/favoris/{id}',[FavorisController::class,'favoris']);
Route::get('supprimerFav/{id_user}/{id_recette}',[FavorisController::class,'supprimerFav']);
//admin
Route::get('/allrecettes',[RecetteController::class,'allrecettes']);
Route::get('/allusers',[AuthController::class,'allusers']);
Route::get('/ajoutadmin',[AuthController::class,'ajoutadmin']);
Route::post('/addadmin',[AuthController::class,'addadmin'])->name('addadmin');
Route::get('/addrecetteadmin',[RecetteController::class,'addrecetteadmin']);
Route::get('/editusers/{id}',[AuthController::class,'editusers']);
Route::get('/editrecette/{id}',[RecetteController::class,'editrecette']);
Route::get('/supprimeruser/{id}',[AuthController::class,'supprimeruser']);

