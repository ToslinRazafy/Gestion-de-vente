@extends('layout')

@section('title', 'Ajout de produit')

@section('content')
<div class="w-1/2 mx-auto mt-4 flex flex-col justify-center">
    <h2 class="text-2xl text-center font-semibold mb-8">Ajouter un utilisateur</h2>
    <form action="{{ route('user.store') }}" method="post" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mt-4">
            <label for="name" class="block mb-2">Nom de l'utilisateur</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded mb-4" placeholder="Nom de l'utilisateur">
            @error('name')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div> 
        
        <div class="mt-4">
            <label for="telephone" class="block mb-2">Telephone</label>
            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" class="w-full p-2 border rounded mb-4" placeholder="Telephone">    
            @error('telephone')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="block mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-2 border rounded mb-4" placeholder="Email">
            @error('email')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="adresse" class="block mb-2">Adresse</label>
            <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" class="w-full p-2 border rounded mb-4" placeholder="Adresse">
            @error('adresse')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block mb-2">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded mb-4" placeholder="Votre mot de passe">
            @error('password')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="mt-4">
            <label for="password_confirmation" class="block mb-2">Confirmer votre mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded mb-4" placeholder="Confirmer votre mot de passe">
            @error('password_confirmation')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="role" class="block mb-2">Role</label>
            <input type="checkbox" name="role" id="role">
        </div>
        
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-600 text-white p-2 rounded">Ajouter</button>
            <button type="reset" class="bg-gray-600 text-white p-2 rounded">Effacer</button>
        </div>
    </form>
</div>
@endsection