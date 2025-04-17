@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-200 via-pink-200 to-purple-300">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Masuk</h2>
        <p class="mt-2 text-sm text-center text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
        </p>
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Login Field -->
            <div>
                <label for="login" class="block text-sm font-medium text-gray-700">Email atau Nomor Telepon</label>
                <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('login')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                <label for="remember_me" class="ml-2 block text-sm text-gray-800">Ingat Saya</label>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Masuk
                </button>
            </div>
        </form>

        @if (Route::has('password.request'))
            <div class="mt-4 text-center">
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                    Lupa Kata Sandi?
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
