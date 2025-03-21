<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Veterinaria Huellitas')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .bg-gradient-custom {
                background: linear-gradient(to right, #b2ebf2, #00838f);
            }
        </style>
    </head>
    <body class="bg-gray-100">
        <nav class="fixed top-0 left-0 w-full bg-gradient-custom p-4 pl-15 pr-10 flex justify-between items-center shadow-md z-50">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-25 h-18">
                <div class="text-[#06332b] text-xl font-bold">
                    Veterinaria Huellitas
                </div>
            </div>
            <ul class="flex space-x-6">
                <li><a href="management" class="text-white hover:text-[#06332b]">Gestión</a></li>
                <li><a href="appointment" class="text-white hover:text-[#06332b]">Citas</a></li>
                <li><a href="#" class="text-white hover:text-[#06332b]">Inventario</a></li>
                <li><a href="#" class="text-white hover:text-[#06332b]">Compras</a></li>
                <li><a href="#" class="text-white hover:text-[#06332b]">Ventas</a></li>
                <li><a href="#" class="text-white hover:text-[#06332b]">Consultas</a></li>
            </ul>
        </nav>

        <div class="p-6 container max-w-full mt-28">
            @yield('content')
        </div>
    </body>
</html>