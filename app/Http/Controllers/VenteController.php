<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DetailVente;
use App\Models\CommandeTemporaire;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{

    public function index(){
        return view('vendeur.index', [
            'produits' => Produit::where('stock', '>', '0')->orderBy('id','desc')->get(),
            'commandes' => CommandeTemporaire::all(),
            'nombreCommande' => Vente::count(),
            'montantTotal' => CommandeTemporaire::sum('montant'),
            "numero" => 0
        ]);
    }

    public function store(Request $request){
        $commandes = CommandeTemporaire::all();

        Client::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom')? $request->input('prenom') : '',
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone')
        ]);

        $vente = new Vente();
        $vente->user_id = Auth::user()->id;
        $vente->clients_id = Client::latest()->first()->id;
        $vente->montant = $request->input('montant');
        $vente->save();

        $detailsVente = new DetailVente();

        foreach ($commandes as $commande){
            $detailsVente->vente_id = Vente::latest()->first()->id;
            $detailsVente->produit_id = $commande->produit_id;
            $detailsVente->prix = $commande->prix;
            $detailsVente->quantite = $commande->quantite;
            $detailsVente->montant = $commande->montant;
            $detailsVente->save();
            $commande->delete();
        }


        return back()->with('success','Achat avec sucees');
    }
}
