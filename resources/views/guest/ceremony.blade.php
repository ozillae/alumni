@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Kegiatan</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($ceremony as $event)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                {{-- Add photo section --}}
                <img src="{{ asset('event-files/'.$event->file_event) }}" loading="lazy" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">{{ $event->name }}</h5>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                    <a href="{{ route('ceremony-detail', $event->id) }}" class="inline-block bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded hover:bg-blue-600">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6 flex justify-center">
        {{-- Add pagination links --}}
        {{ $ceremony->links('pagination::tailwind') }}
    </div>
</div>
@endsection