<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Produits
Route::get('/produits', [\App\Http\Controllers\ProduitsController::class, "liste"]);
Route::get('/produits/eur/{idproduit}', [\App\Http\Controllers\ProduitsController::class, "listeProduitEur"]);
Route::get('/produits/usd/{idproduit}', [\App\Http\Controllers\ProduitsController::class, "listeProduitUsd"]);
Route::get('/produits/btc/{idproduit}', [\App\Http\Controllers\ProduitsController::class, "listeProduitBtc"]);
Route::get('/produits/{id}', [\App\Http\Controllers\ProduitsController::class, "detail"]);
Route::post('/produits', [\App\Http\Controllers\ProduitsController::class, "ajouter"]);
Route::get('/produits/info', [\App\Http\Controllers\ProduitsController::class, "listeProduit"]);

//Commandes
Route::post('/commandes', [\App\Http\Controllers\CommandeController::class, "ajouterCommande"]);
Route::get('/commandes/{idClient}', [\App\Http\Controllers\CommandeController::class, "commandesClient"]);
Route::delete('/commandes/{idCommande}', [\App\Http\Controllers\CommandeController::class, "supprimerCommande"]);
Route::get('/produit/prix/{idClient}', [\App\Http\Controllers\CommandeController::class, "commandesClient"]);

//Clients
Route::post('/inscription', [\App\Http\Controllers\ClientController::class, "creerClient"]);
Route::post('/authentification', [\App\Http\Controllers\ClientController::class, "authentifierUtilisateur"]);

Route::get('/clients', [\App\Http\Controllers\ClientController::class, "Client"]);
