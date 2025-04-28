<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
        <div class="min-h-screen">
            @include('layouts.navigation-member')

            <!-- Page Content -->
            <div class="container mx-auto p-6 mb-6 bg-white">
                @if (session('success'))
                    <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-300 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        
            <footer class="py-4 mt-10">
                <!-- Bagian footer -->
                @include('layouts.footer')
            </footer>
        </div>
        @yield('javascript')
    </body>
</html>
