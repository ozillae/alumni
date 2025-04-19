@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Photo</h1>
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Code</label>
                <input type="text" name="code" id="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="publish" class="block text-gray-700 text-sm font-bold mb-2">Publish</label>
                <select name="publish" id="publish" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="file_path" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" name="file_path" id="file_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </div>
        </form>
@endsection