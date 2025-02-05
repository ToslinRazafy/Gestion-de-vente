<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeTemporaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'nom',
        'prix',
        'quantite',
        'montant'
    ];


    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
