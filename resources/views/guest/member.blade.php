@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-6">Member List</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
        @forelse ($members as $member)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset('profil/woman.png') }}" alt="{{ $member->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h5 class="text-lg font-semibold">{{ $member->name }}</h5>
                <a href="{{ url('/member-detail/' . $member->code) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        </div>
        @empty
        <p class="text-start italic">Tidak ada anggota yang ditemukan</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $members->links('pagination::tailwind') }} <!-- Tailwind pagination links -->
    </div>
</div>
@endsection
