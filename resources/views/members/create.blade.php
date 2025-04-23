@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
            <input type="text" name="code" id="code" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
            <select name="province" id="province" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select Province</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <select name="city" id="city" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="division" class="block text-sm font-medium text-gray-700">Division</label>
            <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select Division</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="joint_date" class="block text-sm font-medium text-gray-700">Joint Date</label>
            <input type="date" name="joint_date" id="joint_date" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection
