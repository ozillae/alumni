@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" class="border border-gray-300 rounded w-full px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded w-full px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="border border-gray-300 rounded w-full px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="link_online" class="block text-sm font-medium">Online Link</label>
            <input type="text" name="link_online" id="link_online" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="file_event" class="block text-sm font-medium">Event Image</label>
            <input type="file" name="file_event" id="file_event" accept="image/*" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection
