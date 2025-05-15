@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Member</h1>
    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
            <input type="text" name="code" id="code" value="{{ $member->code }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ $member->name }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ $member->address }}</textarea>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $member->phone }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $member->email }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
            <select name="province" id="province" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select Province</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->code }}" {{ $member->province == $province->code ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <select name="city" id="city" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $member->city == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="division" class="block text-sm font-medium text-gray-700">Division</label>
            <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">Select Division</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ $member->division == $division->id ? 'selected' : '' }}>
                        {{ $division->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="joint_date" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="border border-gray-300 px-4 py-2 rounded">
                @foreach ($listStatus as $k => $v)
                    <option value="{{ $k }}" {{ $member->status == $k ? 'selected' : '' }}>
                        {{ $v }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md">{{ $member->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
