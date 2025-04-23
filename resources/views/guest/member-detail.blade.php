@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/3 p-6">
                    <img src="{{ asset('profil/woman.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                </div>
                <div class="md:w-2/3 p-6">
                    <h2 class="text-2xl font-bold mb-4">{{ $member->title_front }} {{ $member->name }} {{ $member->title_back }}</h2>
                    <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $member->email }}</p>
                    <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $member->address }}</p>
                    <p class="text-gray-700 mb-2"><strong>Telepon:</strong> {{ $member->phone }}</p>
                    <p class="text-gray-700 mb-2"><strong>Provinsi:</strong> {{ $member->province }}</p>
                    <p class="text-gray-700 mb-2"><strong>Kota:</strong> {{ $member->city }}</p>
                    <p class="text-gray-700 mb-2"><strong>Status:</strong> {{ $member->status }}</p>
                    <p class="text-gray-700 mb-2"><strong>Tanggal Bergabung:</strong> {{ $member->joint_date }}</p>
                    <p class="text-gray-700 mb-4"><strong>Deskripsi:</strong> {{ $member->description }}</p>                    
                    <a href="{{ route('members') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali ke Daftar Anggota</a>
                </div>
            </div>
            <div class="p-6">
                <h2 class="text-xl font-bold">Portfolios</h2>
                <ul class="list-disc pl-5">
                    @forelse($member_portos as $porto)
                        <li>
                            <strong>{{ $porto->title }}</strong> - {{ $porto->institution }}
                            <p>{{ $porto->description }}</p>
                        </li>
                    @empty
                        <li>No portfolios available.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
