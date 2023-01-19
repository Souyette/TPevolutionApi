<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use utils\Template;

class ProduitsController extends Controller
{
    function liste(){
        return response()->json(Produit::all());
    }
    function listeProduit(){
        $infoProduit = Produit::all();
        return view('produit', ['infoProduit' => $infoProduit]);
    }
    function detail($id){
        return response()->json(Produit::find($id));
    }
    function ajouter(Request $request){
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->lien_image = $request->lien_image;
        $produit->prix = $request->prix;
        $produit->tva = $request->tva;
        $produit->save();
        return response()->json($produit);
    }

    //fonction pour retourner le prix en EUR
    function listeProduitEur(Request $request,$idproduit){
        $produit = \App\Models\Produit::where('id',$idproduit)->first();
        $produit->prix*=1;
        return response()->json($produit);
    }

    //fonction pour retourner le prix en USD
    function listeProduitUsd(Request $request,$idproduit){
        $produit = \App\Models\Produit::where('id',$idproduit)->first();
        $produit->prix*=1.08;
        return response()->json($produit);
    }

    //fonction pour retourner le prix en BTC
    function listeProduitBtc(Request $request,$idproduit){
        $produit = \App\Models\Produit::where('id',$idproduit)->first();
        $produit->prix*=0.000052;
        return response()->json($produit);
    }
}
