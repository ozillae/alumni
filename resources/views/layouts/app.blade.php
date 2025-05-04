<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(isset($title))
        <title>{{ $title }}</title>
        <meta name="description" content="{{ $title }}">
        @else
        <title>{{ config('app.name', 'Alfaozi') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
        <div class="container mx-auto px-4 mt-4">
            @include('layouts.navigation')

            <!-- Page Content -->
            @yield('content')
        
            <footer class="py-4 mt-10">
                <!-- Bagian footer -->
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
