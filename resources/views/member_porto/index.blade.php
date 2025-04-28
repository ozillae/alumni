@extends('layouts.member')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Portfolio List</h1>
    <a href="{{ route('portofolio.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Portfolio</a>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Institution</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($portfolios as $portfolio)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $portfolio->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $portfolio->institution }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ Str::limit($portfolio->description, 50) }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="{{ route('portofolio.show', $portfolio) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
                        <a href="{{ route('portofolio.edit', $portfolio) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('portofolio.destroy', $portfolio) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No portfolios found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
