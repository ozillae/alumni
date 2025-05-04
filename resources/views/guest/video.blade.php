@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-6">Video Kegiatan</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($videos as $video)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="aspect-w-16 aspect-h-9">
                <a href="{{ url('/video-detail/' . $video->code) }}">
                    <img class="w-full h-full" src="{{ asset('images/video.jpg') }}" loading="lazy">
                </a>
            </div>
            <div class="p-4">
                <h5 class="text-lg font-semibold">
                    <a href="{{ url('/video-detail/' . $video->code) }}">{{ $video->name }}</a>
                </h5>
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
