@extends('base')

@section('title', 'Se connecter')

@section('content')
    <div class="w-1/3 rounded-2xl flex flex-col justify-center items-center bg-white shadow-xl p-8 relative">
        
        <h2 class="mb-9 text-3xl font-bold text-gray-900 sm:text-title-xl2">Se Connecter</h2>

        <form action="{{ route('auth.login') }}" method="post" class="w-full">
            @csrf  
            <div class="mb-6">
                <label for="telephone" class="mb-2.5 block font-medium text-gray-800">Numéro téléphone</label>
                <div class="relative">
                    <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="Entrer votre numéro" class="w-full rounded-lg border border-gray-300 bg-white py-4 pl-6 pr-12 shadow-md outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"/>
                    <ion-icon name="call-outline" class="absolute right-4 top-4 text-gray-500 text-xl"></ion-icon>
                </div>
                @error('telephone')
                    <span class="mt-2 text-red-500 block text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="mb-2.5 block font-medium text-gray-800">Mot de passe</label>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" class="w-full rounded-lg border border-gray-300 bg-white py-4 pl-6 pr-12 shadow-md outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"/>
                    <ion-icon name="lock-closed-outline" class="absolute right-4 top-4 text-gray-500 text-xl"></ion-icon>
                </div>
                @error('password')
                    <span class="mt-2 text-red-500 block text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <input type="submit" value="Connexion" class="w-full cursor-pointer rounded-lg bg-blue-500 p-4 font-medium text-white shadow-lg transition-all duration-30 hover:bg-blue-600 hover:shadow-xl"/>
            </div>
        </form>
    </div>
@endsection
