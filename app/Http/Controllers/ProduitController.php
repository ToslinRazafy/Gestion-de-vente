<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\CommandeTemporaire;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProduitController extends Controller
{
    public function index(){

        return view("produit.index", [
            "produits" => Produit::orderBy('id', 'desc')->paginate(12),
        ]);        
    }

    public function create(){
        $produit = new Produit();
        return view("produit.create", ['produit' => $produit]);
    }

    public function store(ProduitRequest $request){
        $data = $request->validated();
        /**
         * @var UploadedFile|null $image
         */
        $image = $request->validated('image');
        if($image != null && !$image->getError()){
            $data['image'] = $image->store('produit', 'public');
        }
        Produit::create($data);
        return redirect()->route("produit.list")->with("success","Le produit a bien été enregistrer");
    }

    public function edit(Produit $produit){
        return view('produit.edit', ['produit' => $produit]);
    }

    public function update(Produit $produit, ProduitRequest $request){
        $data = $request->validated();
        /**
         * @var UploadedFile|null $image
         */
        $image = $request->validated('image');
        if($image != null && !$image->getError()){
            $data['image'] = $image->store('produit', 'public');
        }
        $produit->update($data);
        return redirect()->route("produit.list")->with("success","Le produit a bien été modifier");
    }

    public function show(Produit $produit){
        return view('produit.show', ['produit' => $produit]);
    }


    public function delete(Produit $produit){
        $produit->delete();
        return back()->with("success","Suppression avec success");
    }
}
