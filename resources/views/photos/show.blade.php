@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Photo Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Code:</strong> 
            <span class="text-gray-900">{{ $photo->code }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Name:</strong> 
            <span class="text-gray-900">{{ $photo->name }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Publish:</strong> 
            <span class="text-gray-900">{{ $photo->publish ? 'Yes' : 'No' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Description:</strong> 
            <span class="text-gray-900">{{ $photo->description }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Image:</strong> 
            <img src="{{ asset('photo-files/' . $photo->file_path) }}" 
                 alt="{{ $photo->name }}" 
                 class="w-40 h-40 object-cover border border-gray-300 rounded">
        </p>
        <a href="{{ route('photos.index') }}" 
           class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
@endsection
