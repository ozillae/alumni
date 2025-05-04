@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $ceremony->name }}</h1>
    <p class="text-gray-700 mb-4">{{ $ceremony->description }}</p>
    <p class="text-gray-600 mb-2"><strong>Date:</strong> {{ $ceremony->start_date }}</p>
    <p class="text-gray-600 mb-6"><strong>Location:</strong> {{ $ceremony->location }}</p>

    {{-- Add photo section --}}
    <div class="mb-6">
        <img src="{{ asset('event-files/'.$ceremony->file_event) }}" alt="{{ $ceremony->name }}" class="w-full h-auto rounded-lg shadow-md">
    </div>
    <div class="">
        {{ nl2br($ceremony->description) }}
    </div>

    <h3 class="text-xl font-semibold mb-4 mt-6">Related Events</h3>
    <ul class="space-y-4">
        @foreach($relatedEvents as $event)
            <li class="border-b pb-4">
                <a href="{{ route('ceremony-detail', ['id' => $event->id]) }}" class="text-blue-500 hover:underline font-medium">{{ $event->name }}</a>
                <p class="text-gray-600 text-sm">{{ Str::limit($event->description, 100) }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection