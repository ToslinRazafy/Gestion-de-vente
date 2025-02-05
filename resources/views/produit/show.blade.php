@extends('layout')

@section('title', "Détails du Produit")

@section('content')
<div class="mx-auto w-10/12 p-6">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Détails du Produit</h2>
    <div class="flex justify-between bg-white p-6 rounded-lg shadow-lg">
        <div class="">
            <div class="mb-4">
                <label for="id" class="font-semibold text-gray-600">ID du produit:</label>
                <span>{{ $produit->id }}</span>
            </div>
            <div class="mb-4">
                <label for="nom" class="font-semibold text-gray-600">Nom:</label>
                <span>{{ $produit->nom }}</span>
            </div>
            <div class="mb-4">
                <label for="description" class="font-semibold text-gray-600">Description:</label>
                <span>{{ $produit->description }}</span>
            </div>
            <div class="mb-4">
                <label for="prix" class="font-semibold text-gray-600">Prix:</label>
                <span>{{ $produit->prix }} Ar</span>
            </div>
            <div class="mb-4">
                <label for="stock" class="font-semibold text-gray-600">Stock:</label>
                <span>{{ $produit->stock }}</span>
            </div>
            <div class="mb-4">
                <label for="created_at" class="font-semibold text-gray-600">Date d'ajout:</label>
                <span>{{ $produit->created_at->format('d/m/Y') }}</span>
            </div>
        </div>
        @if ($produit->image) 
            <div class="mb-4">
                <label for="id" class="font-semibold text-gray-600">Image du produit:</label>
                <img src="{{ $produit->imageUrl() }}" alt="image du produit {{ $produit->id }}" class="w-80 h-80 object-cover">
            </div>
        @endif
   </div>
   <div class="mt-6">
        <a href="{{ route('produit.list') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
            <ion-icon name="arrow-back-outline"></ion-icon> Retour à la liste des produits
        </a>
    </div>
</div>
@endsection
