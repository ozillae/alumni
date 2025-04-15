@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Daftar</h2>
        <p class="mt-2 text-sm text-center text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk</a>
        </p>
        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500"> *</span></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="phone" class="form-label">Telepon <span class="text-red-500"> *</span></label>
                <div class="flex items-center">
                    <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100  hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 border" type="button">
                        +62
                    </button>
                    <input type="text" class="w-full" placeholder="81234567890" name="phone" value="{{ old('phone') }}">
                </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi <span class="text-red-500"> *</span></label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi <span class="text-red-500"> *</span></label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
