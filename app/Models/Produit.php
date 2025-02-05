<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "description",
        "prix",
        "stock",
        'image'
    ];


    public function imageUrl(){
        return Storage::url($this->image); 
    }
}
