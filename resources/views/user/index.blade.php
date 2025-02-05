@extends('layout')

@section('title', 'Ajout de user')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">Liste des utilisateurs</h2>
        <a href="{{ route('user.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">Ajout d'utilisateur</a>
    </div>
    <div class="overflow-x-auto">
        @if (session('success'))
            <div id="success-message" class="fixed top-0 left-1/2 transform -translate-x-1/2 flex justify-center bg-green-500 text-white p-4 rounded shadow-md transition-all duration-300">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById("success-message");
                    message.classList.add('opacity-0');
                    setTimeout(function() {
                        message.style.display = "none";
                    }, 300);
                }, 3000);
            </script>
        @endif

        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-6 border">ID</th>
                    <th class="py-3 px-6 border">Nom</th>
                    <th class="py-3 px-6 border">Telephone</th>
                    <th class="py-3 px-6 border">Adresse</th>
                    <th class="py-3 px-6 border">Email</th>
                    <th class="py-3 px-6 border">Role</th>
                    <th class="py-3 px-6 border">Date d'ajout</th>
                    <th class="py-3 px-6 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr class="transition cursor-pointer border hover:bg-gray-100 ">
                            <td class="py-3 px-6 text-center">{{ $user->id }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->telephone }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->adresse }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->role }}</td>
                            <td class="py-3 px-6 text-center text-gray-500">{{ $user->created_at->locale('fr')->isoFormat('dddd D MMMM YYYY HH:mm') }}</td>
                            <td class="py-3 px-6 text-center flex justify-between items-center">
                                <a href="#" class="text-teal-500 hover:text-teal-700 text-lg">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce utilisateur ?');">
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
                        <td colspan="7" class="py-4 px-6 text-center text-gray-500">Aucun utilisateur disponible</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>

@endsection