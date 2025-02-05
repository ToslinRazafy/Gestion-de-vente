<div class="w-1/2 mx-auto mt-12 flex flex-col justify-center">
    <h2 class="text-2xl text-center font-semibold mb-8">
        @if (!$produit->id)
            Ajouter un Produit        
        @else
            Modifier le produit
        @endif
    </h2>
    <form action="" method="post" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
        @csrf
        @method($produit->id? "PATCH" : "POST")
        <div class="mt-4">
            <label for="nom" class="block mb-2">Nom du produit</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" class="w-full p-2 border rounded mb-4" placeholder="Nom du produit">
            @error('nom')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div> 

        <div class="mt-4">
            <label for="description" class="block mb-2">Description du produit</label>
            <textarea name="description" id="description" class="w-full p-2 border rounded mb-4 resize-none" rows="4" placeholder="Description du produit">{{ old('description', $produit->description) }}</textarea>
            @error('description')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mt-4">
            <label for="prix" class="block mb-2">Prix</label>
            <input type="number" id="prix" name="prix" min="1" value="{{ old('prix', $produit->prix) }}" class="w-full p-2 border rounded mb-4" placeholder="Prix">    
            @error('prix')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="stock" class="block mb-2">Stock</label>
            <input type="number" id="stock" name="stock" min="1" value="{{ old('stock', $produit->stock) }}" class="w-full p-2 border rounded mb-4" placeholder="Stock">
            @error('stock')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="image" class="block mb-2">Image</label>
            <input type="file" id="image" name="image" class="w-full p-2 border rounded mb-4" placeholder="imGE">
            @error('image')
                <span class="text-red-500 mb-4">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-600 text-white p-2 rounded">
                @if (!$produit->id)
                    Ajouter
                @else
                    Modifier
                @endif
            </button>
            @if (!$produit->id)
                <button type="reset" class="bg-gray-600 text-white p-2 rounded">Effacer</button>
            @else
                <a href="{{ route('produit.list') }}" class="bg-gray-600 text-white p-2 rounded">Annuler</a>
            @endif
        </div>
    </form>
</div>