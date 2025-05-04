@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Video</h1>
    <form action="{{ route('videos.update', $video) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="code" class="block text-gray-700">Code</label>
            <input type="text" name="code" id="code" value="{{ old('code', $video->code) }}" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $video->name) }}" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="url" class="block text-gray-700">URL</label>
            <input type="url" name="url" id="url" value="{{ old('url', $video->url) }}" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded">{{ old('description', $video->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label for="publish" class="block text-gray-700">Publish</label>
            <select name="publish" id="publish" class="w-full border-gray-300 rounded">
                <option value="1" {{ old('publish', $video->publish) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('publish', $video->publish) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update
        </button>
    </form>
@endsection
