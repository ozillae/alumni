@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Event Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Code:</strong> 
            <span class="text-gray-900">{{ $event->code }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Name:</strong> 
            <span class="text-gray-900">{{ $event->name }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Description:</strong> 
            <span class="text-gray-900">{{ $event->description }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Start Date:</strong> 
            <span class="text-gray-900">{{ $event->start_date }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">End Date:</strong> 
            <span class="text-gray-900">{{ $event->end_date }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Link:</strong> 
            <a href="{{ $event->link_online }}" class="text-blue-500 hover:underline">{{ $event->link_online }}</a>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">File:</strong> 
            @if($event->file_event)
                <a href="{{ asset('storage/' . $event->file_event) }}" class="text-blue-500 hover:underline" target="_blank">Download</a>
            @else
                <span class="text-gray-900">N/A</span>
            @endif
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Location:</strong> 
            <span class="text-gray-900">{{ $event->location }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Active:</strong> 
            <span class="text-gray-900">{{ $event->active == 1 ? 'Active' : 'Nonactive' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Created By:</strong> 
            <span class="text-gray-900">{{ $event->creator ? $event->creator->name : 'N/A' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Updated By:</strong> 
            <span class="text-gray-900">{{ $event->updater ? $event->updater->name : 'N/A' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Created At:</strong> 
            <span class="text-gray-900">{{ $event->created_at }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Updated At:</strong> 
            <span class="text-gray-900">{{ $event->updated_at }}</span>
        </p>
        <a href="{{ route('events.index') }}" 
           class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
@endsection
