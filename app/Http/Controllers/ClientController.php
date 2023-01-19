<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function creerClient(Request $request){
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->password = password_hash($request->motdepasse,PASSWORD_DEFAULT);
        $client->save();
        return response()->json($client);

    }

    function authentifierUtilisateur(Request $request){
        $infoClient=Client::where('email',$request->email)->first();

        if(password_verify($request->motdepasse,$infoClient->password)){
            return response()->json($infoClient);
        }
        else {
            return response()->json([
                'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
        }
    }

    function Client(Request $request){
        return response()->json(Client::all());
    }
}
