@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Division Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Code:</strong> 
            <span class="text-gray-900">{{ $division->code }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Name:</strong> 
            <span class="text-gray-900">{{ $division->name }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Description:</strong> 
            <span class="text-gray-900">{{ $division->description }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Active:</strong> 
            <span class="text-gray-900">{{ $division->active ? 'Yes' : 'No' }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Created By:</strong> 
            <span class="text-gray-900">{{ $division->created_by }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Updated By:</strong> 
            <span class="text-gray-900">{{ $division->updated_by }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Created At:</strong> 
            <span class="text-gray-900">{{ $division->created_at }}</span>
        </p>
        <p class="mb-2">
            <strong class="text-gray-700 w-32 inline-block">Updated At:</strong> 
            <span class="text-gray-900">{{ $division->updated_at }}</span>
        </p>
        <a href="{{ route('divisions.index') }}" 
           class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
@endsection
