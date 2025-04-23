@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Event</h1>
    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ $event->name }}" class="border border-gray-300 rounded w-full px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded w-full px-3 py-2">{{ $event->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" value="{{ $event->start_date }}" class="border border-gray-300 rounded w-full px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" value="{{ $event->end_date }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" value="{{ $event->location }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="link_online" class="block text-sm font-medium">Online Link</label>
            <input type="text" name="link_online" id="link_online" value="{{ $event->link_online }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="file_event" class="block text-sm font-medium">Event Image</label>
            <input type="file" name="file_event" id="file_event" accept="image/*" class="border border-gray-300 rounded w-full px-3 py-2">
            @if($event->file_event)
                <p class="mt-2 text-sm text-gray-600">
                    Current Image: 
                    <a href="{{ asset('storage/' . $event->file_event) }}" class="text-blue-500 hover:underline" target="_blank">View</a>
                </p>
            @endif
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
