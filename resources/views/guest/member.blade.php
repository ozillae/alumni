@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">

    <!-- Filter Form -->
    <form method="GET" action="{{ url('/member') }}" class="my-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ request('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="division" class="block text-sm font-medium text-gray-700">Bidang Keahlian</label>
                <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Semua Bidang</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ request('division') == $division->id ? 'selected' : '' }}>
                        {{ $division->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Cari</button>
            </div>
        </div>
    </form>
    <!-- End Filter Form -->

    <h1 class="text-2xl font-bold my-6">Daftar Anggota</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
        @forelse ($members as $member)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            @if(file_exists('member-files/'.$member->file_profil))
            <img src="{{ asset('member-files/'.$member->file_profil) }}"  alt="{{ $member->name }}" class="w-full h-48 object-cover">
            @else
            <img src="{{ asset('profil/woman.png') }}" alt="{{ $member->name }}" class="w-full h-48 object-cover">
            @endif
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
