@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Video Section -->
        <div class="lg:col-span-2">
            <div class="bg-black rounded-lg overflow-hidden">
                <iframe class="w-full h-96" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $video->name }}</h1>
                <p class="text-sm text-gray-600 mt-2">{{ $video->description }}</p>
            </div>
        </div>

        <!-- Related Videos Section -->
        <div>
            <h2 class="text-xl font-bold mb-4 text-gray-800">Related Videos</h2>
            <div class="space-y-4">
                @forelse ($relatedVideos as $relatedVideo)
                <div class="flex items-start space-x-4">
                    <div class="w-32 h-20 bg-black rounded-lg overflow-hidden">
                        <a href="{{ url('/video-detail/' . $relatedVideo->code) }}">
                            <img class="w-full h-full" src="{{ asset('images/video.jpg') }}">
                        </a>
                    </div>
                    <div>
                        <a href="{{ url('/video-detail/' . $relatedVideo->code) }}" class="text-lg font-semibold text-gray-800 hover:underline">
                            {{ $relatedVideo->name }}
                        </a>
                        <p class="text-sm text-gray-600">{{ Str::limit($relatedVideo->description, 50) }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-600 italic">No related videos available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
