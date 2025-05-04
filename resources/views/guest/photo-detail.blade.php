@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Photo Section -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('photo-files/' . $photo->file_path) }}" alt="{{ $photo->name }}" class="w-full h-auto object-cover">
            </div>
            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $photo->name }}</h1>
                <p class="text-sm text-gray-600 mt-2">{{ $photo->description }}</p>
                
            </div>
        </div>

        <!-- Related Photos Section -->
        <div>
            <h2 class="text-xl font-bold mb-4 text-gray-800">Related Photos</h2>
            <div class="space-y-4">
                @forelse ($relatedPhotos as $relatedPhoto)
                <div class="flex items-start space-x-4">
                    <div class="w-32 h-20 bg-gray-200 rounded-lg overflow-hidden">
                        <img src="{{ asset('photo-files/' . $relatedPhoto->file_path) }}" alt="{{ $relatedPhoto->name }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <a href="{{ url('/photo-detail/' . $relatedPhoto->code) }}" class="text-lg font-semibold text-gray-800 hover:underline">
                            {{ $relatedPhoto->name }}
                        </a>
                        <p class="text-sm text-gray-600">{{ Str::limit($relatedPhoto->description, 50) }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-600 italic">No related photos available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
