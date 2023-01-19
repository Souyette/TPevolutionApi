<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    function ajouterCommande(Request $request){
        $commande = new Commande();
        $commande->id_client = $request->idClient;
        $commande->id_produit = $request->idProduit;
        $commande->quantite = $request->quantite;
        $commande->date = $request->date;
        $commande->save();
        return response()->json($commande);
    }
    function commandesClient($idClient){
        return response()->json(Commande::where('id_client',$idClient)->with('produit')->get());
    }

    function supprimerCommande($idCommande){
        Commande::destroy($idCommande);
    }
}
