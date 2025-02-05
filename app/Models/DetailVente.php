<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailVente extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix',
        'quantite',
        'montant'
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function vente(){
        return $this->belongsTo(Vente::class);
    }
}
