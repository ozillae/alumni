@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-800">Dasbor</h1>
        <p class="mt-4 text-lg text-gray-600">
            Selamat datang di dasbor Anda. Kelola profil Anda dan tetap terhubung dengan komunitas alumni.
        </p>
        <div class="mt-6">
            <a href="{{ route('profile.edit') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
