@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-6">Photo Kegiatan</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
        @forelse ($photos as $photo)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset('photo-files/'.$photo->file_path) }}" loading="lazy" alt="{{ $photo->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h5 class="text-lg font-semibold">{{ $photo->name }}</h5>
                <a href="{{ url('/photo-detail/' . $photo->code) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        </div>
        @empty
        <p class="text-start italic">Tidak ada Photo yang dibagikan</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $photos->links('pagination::tailwind') }} <!-- Tailwind pagination links -->
    </div>
</div>
@endsection
