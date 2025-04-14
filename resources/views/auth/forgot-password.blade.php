@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Lupa Kata Sandi</h2>
        <p class="mt-2 text-sm text-center text-gray-600">
            Masukkan email Anda untuk menerima tautan reset kata sandi.
        </p>
        <form method="POST" action="{{ route('password.email') }}" class="mt-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Kirim Tautan Reset
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">
                Kembali ke Halaman Masuk
            </a>
        </div>
    </div>
</div>
@endsection
