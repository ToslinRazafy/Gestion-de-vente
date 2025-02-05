<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Import des icônes Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    @Vite(['resources/css/app.css'])
    
    <style>
        .sidebar {
            transition: width 0.3s;
        }
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        
        .sidebar.collapsed ion-icon {
            font-size: 2rem;
            
        }

        .sidebar.collapsed #productMenu,
        .sidebar.collapsed #userMenu {
            position: absolute;
            left: 20px;
            top: 0;
            width: auto;
            background-color: #1E40AF; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <div id="sidebar" class="sticky top-0 left-0 sidebar w-64 bg-blue-900 text-white h-screen p-4 flex flex-col">
        <button id="toggleSidebar" class="flex justify-between items-center mb-4 text-white focus:outline-none">
            <span class="sidebar-text">Menu</span>
            <ion-icon name="menu-outline" size="large"></ion-icon>
        </button>
        <ul class="flex flex-col space-y-4">
            <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 p-2 rounded hover:bg-blue-700">
                <ion-icon name="home-outline"></ion-icon> <span class="sidebar-text">Dashboard</span>
            </a></li>
            <li class="relative">
                <button class="flex items-center gap-2 p-2 w-full text-left rounded hover:bg-blue-700" id="toggleProductMenu">
                    <ion-icon name="cube-outline"></ion-icon> <span class="sidebar-text">Produits</span>
                    <ion-icon name="chevron-down-outline" class="sidebar-text"></ion-icon>
                </button>
                <ul id="productMenu" class="hidden ml-6 space-y-2">
                    <li><a href="{{ route('produit.list') }}" class="block p-2 rounded hover:bg-blue-700">Liste</a></li>
                    <li><a href="{{ route('produit.create') }}" class="block p-2 rounded hover:bg-blue-700">Ajout</a></li>
                </ul>
            </li>
            <li class="relative">
                <button class="flex items-center gap-2 p-2 w-full text-left rounded hover:bg-blue-700" id="toggleUserMenu">
                    <ion-icon name="person-outline"></ion-icon> <span class="sidebar-text">Utilisateurs</span>
                    <ion-icon name="chevron-down-outline" class="sidebar-text"></ion-icon>
                </button>
                <ul id="userMenu" class="hidden ml-6 space-y-2">
                    <li><a href="{{ route('user.list') }}" class="block p-2 rounded hover:bg-blue-700">Liste</a></li>
                    <li><a href="{{ route('user.create') }}" class="block p-2 rounded hover:bg-blue-700">Ajout</a></li>
                </ul>
            </li>
            <li><a href="#" class="flex items-center gap-2 p-2 rounded hover:bg-blue-700">
                <ion-icon name="cart-outline"></ion-icon> <span class="sidebar-text">Vente</span>
            </a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="sticky top-0 bg-white shadow p-4 flex justify-between items-center z-50">
            <span class="text-lg font-semibold">Admin Dashboard</span>
            <div class="relative">
               @auth
                    <button id="toggleAccountMenu" class="flex items-center gap-2">
                        <span>{{ Auth::user()->name }}</span>
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </button>
                    <ul id="accountMenu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md p-2 space-y-2">
                        <li><a href="#" class="block p-2 rounded hover:bg-gray-200">Paramètres du compte</a></li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="w-full p-2 rounded hover:bg-gray-200">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
               @endauth
            </div>
        </header>

        <div class="p-6">
            @yield('content')
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#toggleSidebar').click(function() {
                $('#sidebar').toggleClass('collapsed');
            });
            $('#toggleProductMenu').click(function() {
                $('#productMenu').slideToggle();
            });
            $('#toggleUserMenu').click(function() {
                $('#userMenu').slideToggle();
            });
            $('#toggleAccountMenu').click(function() {
                $('#accountMenu').toggle();
            });
        });
    </script>
</body>
</html>
