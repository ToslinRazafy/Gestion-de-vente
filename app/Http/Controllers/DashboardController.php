<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Vente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'nombreClients' => Client::distinct('telephone')->count(),
            'nombreProduitVendu' => DetailVente::sum('quantite'),
            'totalVente' => Vente::sum('montant'),
        ]);
    }
}
