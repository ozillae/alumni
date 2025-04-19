@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Divisions</h1>
    <a href="{{ route('divisions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Division</a>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as $division)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($divisions->currentPage() - 1) * $divisions->perPage() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $division->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $division->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('divisions.show', $division) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('divisions.edit', $division) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('divisions.destroy', $division) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="bg-red-500 text-white px-2 py-1 rounded delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $divisions->links() }}
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
