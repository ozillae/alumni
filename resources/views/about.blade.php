@extends('layouts.app')

@section('content')
<div class="mt-10">
    <!-- About Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold text-gray-800">Tentang Kami</h1>
                <p class="mt-6 text-xl text-gray-700">
                    {{ config('app.name', 'Alumni') }} adalah platform yang menghubungkan alumni dari berbagai latar belakang untuk berbagi pengalaman, memperluas jaringan, dan mendukung satu sama lain.
                </p>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Misi Kami</h2>
                    <p class="mt-4 text-gray-600">
                        Membangun komunitas alumni yang kuat dan saling mendukung untuk mencapai kesuksesan bersama.
                    </p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Visi Kami</h2>
                    <p class="mt-4 text-gray-600">
                        Menjadi platform utama bagi alumni untuk terhubung, belajar, dan berkembang bersama.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
