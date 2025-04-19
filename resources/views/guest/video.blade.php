@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-6">Video Kegiatan</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($videos as $video)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="aspect-w-16 aspect-h-9">
                <iframe class="w-full h-full" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="p-4">
                <h5 class="text-lg font-semibold">{{ $video->name }}</h5>
                <p class="text-sm text-gray-600 mt-2">{{ $video->description }}</p>
                <a href="{{ url('/video-detail/' . $video->code) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        </div>
        @empty
        <p class="text-start italic">Tidak ada Video yang dibagikan</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $videos->links('pagination::tailwind') }} <!-- Tailwind pagination links -->
    </div>
</div>
@endsection
