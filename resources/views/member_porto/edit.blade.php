@extends('layouts.member')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Portfolio</h1>
    <form action="{{ route('portofolio.update', $memberPorto) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ $memberPorto->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
            <input type="text" name="institution" id="institution" value="{{ $memberPorto->institution }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ $memberPorto->description }}</textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </div>
    </form>
</div>
@endsection
