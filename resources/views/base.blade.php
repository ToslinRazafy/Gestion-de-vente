<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>@yield('title')</title>

    <!-- Import des icônes Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    @Vite(['resources/css/app.css'])
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-br from-[#dff3fc] via-[#fff6e4] to-[#f8f4ec] dark:bg-gray-900">
    @yield('content')        
</body>
</html>
