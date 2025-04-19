@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Division</h1>
    <form action="{{ route('divisions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
            <input type="text" name="code" id="code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection
