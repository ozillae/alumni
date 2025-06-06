@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Video Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Code:</strong> 
            <span class="text-gray-900">{{ $video->code }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Name:</strong> 
            <span class="text-gray-900">{{ $video->name }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Description:</strong> 
            <span class="text-gray-900">{{ $video->description }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Publish:</strong> 
            <span class="text-gray-900">{{ $video->publish ? 'Yes' : 'No' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">URL:</strong> 
            <a href="{{ $video->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $video->url }}</a>
        </p>
        <a href="{{ route('videos.index') }}" class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
    </div>
@endsection
