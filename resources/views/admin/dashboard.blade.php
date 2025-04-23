@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <p class="text-gray-600 mb-8">Welcome to the admin dashboard!</p>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Quick Links</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('divisions.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg hover:bg-blue-600 transition">
                Manage Divisions
            </a>
            <a href="{{ route('photos.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg hover:bg-blue-600 transition">
                Manage Photos
            </a>
            <a href="{{ route('videos.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg hover:bg-blue-600 transition">
                Manage Videos
            </a>
            <a href="{{ route('members.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg hover:bg-blue-600 transition">
                Manage Members
            </a>
        </div>
    </div>
</div>
@endsection
