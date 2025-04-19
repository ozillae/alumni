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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
    <div class="min-h-screen">
        @include('layouts.navigation-admin')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-100 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <div class="container mx-auto p-5 bg-white">
            @yield('content')
        </div>
        
        <footer class="py-4 mt-10 bg-gray-100">
            <!-- Bagian footer -->
            @include('layouts.footer')
        </footer>
    </div>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
