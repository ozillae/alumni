@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Photos</h1>
    <a href="{{ route('photos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Photo</a>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Publish</th>
                <th class="border border-gray-300 px-4 py-2">Image</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($photos->currentPage() - 1) * $photos->perPage() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $photo->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $photo->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $photo->publish ? 'Yes' : 'No' }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->name }}" class="w-20 h-20 object-cover">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('photos.show', $photo) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('photos.edit', $photo) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('photos.destroy', $photo) }}" method="POST" class="inline delete-form">
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
        {{ $photos->links() }}
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
