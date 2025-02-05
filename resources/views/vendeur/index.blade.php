@extends('base')

@section('title', "Vente et Client")

@section('content')
<div class="h-screen w-full flex flex-col bg-gradient-to-br from-[#dff3fc] via-[#fff6e4] to-[#f8f4ec] p-8">
    <div class="flex justify-between items-center mb-8">
        <input type="text" placeholder="🔍 Rechercher un produit..." class="w-1/3 px-4 py-2 rounded-lg border border-gray-300 shadow-md focus:outline-none">
        <div class="flex gap-4 items-center justify-center text-right">
            @auth
                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        {{ Auth::user()->name }}
                    </h1>
                    <h2 class="text-gray-600">{{ Auth::user()->role }}</h2>
                </div>
                <form action="{{ route('auth.logout') }}" method="post">
                    @method("delete")
                    @csrf
                    <button class="bg-red-600 text-white p-2 rounded hover:bg-red-400 transition-colors duration-300">Se deconnecter</button>
                </form>
            @endauth
        </div>
    </div>
    
    @if (count($produits) > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 max-h-[1000px] overflow-y-auto product-contain" id="product-contain">
            <!-- Carte Produit -->
            @foreach ($produits as $produit)
                <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center transform hover:scale-105 transition products">
                    <img src="{{ $produit->imageUrl() }}" alt="Produit {{ $produit->id }}" class="w-32 h-32 object-cover rounded-md mb-4">
                    <h1 class="text-lg font-semibold">Nom produit : <span class="nom">{{ $produit->nom }}</span></h1>
                    <h2 class="text-gray-600">Prix : <span class="font-bold text-red-500" class="prix">{{ $produit->prix }} Ar</span></h2>
                    <h3 class="text-gray-700">Stock : <span class="stock">{{ $produit->stock }}</span></h3>
                    <div class="mt-4 w-full flex flex-col">
                        <label class="text-sm text-gray-600">Quantité achetée :</label>
                        <input type="number" min="1" value="1" id="quantite_{{ $produit->id }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mt-4 w-full flex justify-between items-center">
                        <button  onclick="handleClick('{{ $produit->id }}')" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center">
                            <ion-icon name="cart-outline" class="mr-2"></ion-icon> Acheter
                        </button>
                        <a href="#" class="text-blue-600 hover:underline">Détails</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="font-bold capitalize flex justify-center items-center">Aucun produit</div>
    @endif
</div>

<div class="w-[30%] bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white h-screen p-8 flex flex-col">
    <h1 class="text-2xl font-bold flex items-center mb-6">
        <ion-icon name="receipt-outline" class="mr-2"></ion-icon> 🛒 Commande
    </h1>

    <h1 class="text-2xl font-bold mb-6 text-center">Numero de Commande {{ $nombreCommande + 1 }}</h1>

    <!-- Résumé de la commande -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg">
       <div class="max-h-[370px] overflow-y-auto">
        <table class="w-full text-left border-collapse" id="table">
                <thead>
                    <tr class="sticky top-0 bg-gray-800 border-b border-gray-600">
                        <th class="pb-2">N</th>
                        <th class="pb-2">Nom</th>
                        <th class="pb-2">Prix</th>
                        <th class="pb-2">Quantité</th>
                        <th class="pb-2">Montant</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($commandes) > 0)
                        @foreach ($commandes as $commande)
                            <tr class="bg-gray-800 hover:bg-gray-700 transition-all">
                                <td class="text-center">{{ $numero = $numero + 1 }}</td>
                                <td class="text-center">{{ $commande->nom }}</td>
                                <td class="text-center">{{ $commande->prix }} Ar</td>
                                <td class="text-center">{{ $commande->quantite }}</td>
                                <td class="text-center">{{ $commande->montant }} Ar</td>
                                <td class="text-center">
                                    <form action="{{ route('commande.delete', $commande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce utilisateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-lg">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="py-4 px-6 text-center text-gray-500">Aucun commande</td>
                        </tr>
                    @endif
                </tbody>
            </table>
       </div>
        <div class="flex justify-between items-center mt-4">
            <span class="text-lg">Montant Total :</span>
            <strong class="text-xl text-green-400">{{ $montantTotal }} Ar</strong>
        </div>
    </div>

    <!-- Informations client -->
    <form class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg mt-6" action="{{ route('achat.store') }}" method="post">
        @csrf
        <h2 class="text-lg font-semibold mb-4 flex items-center">
            <ion-icon name="person-circle-outline" class="mr-2"></ion-icon> Informations Client
        </h2>
        <div class="grid grid-cols-1 gap-3">
            <input type="text" name="nom" placeholder="Nom" class="bg-gray-700 text-white px-3 py-2 rounded focus:outline-none" required>
            <input type="text" name="prenom" placeholder="Prénom" class="bg-gray-700 text-white px-3 py-2 rounded focus:outline-none">
            <input type="text" name="adresse" placeholder="Adresse" class="bg-gray-700 text-white px-3 py-2 rounded focus:outline-none" required>
            <input type="text" name="telephone" placeholder="Téléphone" class="bg-gray-700 text-white px-3 py-2 rounded focus:outline-none" required>
            <input type="number" name="montant" placeholder="montant" min="1" class="bg-gray-700 text-white px-3 py-2 rounded focus:outline-none" required>
        </div>

        <div class="flex gap-6 mt-6">
            <button type="button" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition flex items-center">
                 Annuler la commande
            </button>
            <button type="submit" class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition flex items-center">
                Confirmer & Imprimer
            </button>
        </div>
    </form>

</div>
<script>
    const handleClick = async(id) => {

        const csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute('content');
        const quantite = document.getElementById('quantite_'+id).value;

        await fetch('/commande/'+id, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                quantite: quantite
            })
        }).then((response) => {
            if(response.ok){
                window.location.reload();
                console.log(response);
             }else{
                alert("NOT OK");
            }
        }).catch(error => console.log(error));

    }
</script>

@endsection
