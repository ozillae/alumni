@extends('layouts.app')

@section('content')
<div class="">
    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center text-gray-800">
            <h1 class="text-5xl font-extrabold tracking-tight">Selamat Datang di {{ config('app.name', 'Alumni') }}</h1>
            <p class="mt-6 text-xl text-gray-700">
                Terhubung dengan alumni, berbagi pengalaman, dan berkembang bersama.
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ url('/register') }}" class="px-8 py-4 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 transition">
                    Bergabung Sekarang
                </a>
                <a href="{{ url('/about') }}" class="px-8 py-4 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-lg hover:bg-gray-400 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 py-16 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-800">Apa yang Kami Tawarkan</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Jelajahi manfaat menjadi bagian dari jaringan alumni kami.
                </p>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="text-blue-500 text-4xl mb-4">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Jaringan</h3>
                    <p class="mt-4 text-gray-600">
                        Terhubung dengan alumni dari berbagai industri dan perluas jaringan profesional Anda.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="text-green-500 text-4xl mb-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Acara</h3>
                    <p class="mt-4 text-gray-600">
                        Ikuti acara eksklusif, lokakarya, dan reuni.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="text-purple-500 text-4xl mb-4">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Sumber Daya</h3>
                    <p class="mt-4 text-gray-600">
                        Akses sumber daya karir, program mentorship, dan lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-blue-200 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-800">Siap untuk Memulai?</h2>
            <p class="mt-6 text-lg text-gray-700">
                Bergabunglah dengan jaringan alumni kami hari ini dan mulai membangun koneksi yang berarti.
            </p>
            <div class="mt-8">
                <a href="{{ url('/register') }}" class="px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg shadow-lg hover:bg-gray-100 transition">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
