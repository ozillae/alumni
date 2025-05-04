@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden py-10">
        <div class="md:flex">
            <div class="md:w-1/3 p-6">
                @if(file_exists('member-files/'.$member->file_profil))
                <img src="{{ asset('member-files/'.$member->file_profil) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                @else 
                <img src="{{ asset('profil/woman.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                @endif
            </div>
            <div class="md:w-2/3 px-6">
                <h2 class="text-2xl font-bold mb-4">{{ $member->title_front }} {{ $member->name }}{{ $member->title_back != null ? ', ' : '' }} {{ $member->title_back }}</h2>
                <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $member->email }}</p>
                @if($member->publish_phone == true)
                    <p class="text-gray-700 mb-2"><strong>Telepon:</strong> {{ displayPhoneNumber($member->phone) }}</p>
                @endif
                <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $member->address }}</p>
                <p class="text-gray-700 mb-2"><strong>Provinsi:</strong> {{ $member->dataProvince->name }}</p>
                <p class="text-gray-700 mb-2"><strong>Kota:</strong> {{ $member->dataCity->name }}</p>
                <p class="text-gray-700 mb-2"><strong>Bidang:</strong> {{ $member->dataDivision->name }}</p>
                <p class="text-gray-700 mb-2"><strong>Tanggal Bergabung:</strong> {{ displayDate($member->joint_date) }}</p>
                <p class="text-gray-700 mb-4"><strong>Deskripsi:</strong> {!! nl2br($member->description) !!}</p>                    
            </div>
        </div>
        <div class="px-6">
            <h2 class="text-xl font-bold">Porto Folio</h2>
            <ul class="list-disc pl-5">
                @forelse($member_portos as $porto)
                <li>
                    <strong>{{ $porto->title }}</strong> - {{ $porto->institution }}
                    <p>{{ $porto->description }}</p>
                </li>
                @empty
                <li>Tidak ada porto folio yang ditampilkan.</li>
                @endforelse
            </ul>
        </div>
        <div class="p-6">
            <a href="{{ route('members') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali ke Daftar Anggota</a>
        </div>
    </div>
</div>
@endsection
