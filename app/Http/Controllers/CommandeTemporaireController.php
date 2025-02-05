<?php

namespace App\Http\Controllers;

use App\Models\CommandeTemporaire;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeTemporaireController extends Controller
{
    public function store(Produit $produit, Request $request){
        $commande = CommandeTemporaire::create([
            'produit_id' => $produit->id,
            'nom' => $produit->nom,
            'prix' => $produit->prix,
            'quantite' => $request->input('quantite'),
            'montant' => ($produit->prix * $request->input('quantite')),
        ]);

        $produit->stock = $produit->stock - $request->input('quantite');
        $produit->update();

        return $commande;
    }

    public function delete(CommandeTemporaire $produit){
        $prod = Produit::find($produit->produit_id);
        $prod->stock = $prod->stock + $produit->quantite;
        $prod->update();
        $produit->delete();
        return back()->with("success","Suppression avec success");
    }
}
