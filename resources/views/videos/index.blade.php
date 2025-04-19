@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Videos</h1>
    <a href="{{ route('videos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add Video</a>
    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2">Code</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Publish</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $video->code }}</td>
                    <td class="px-4 py-2">{{ $video->name }}</td>
                    <td class="px-4 py-2">{{ $video->publish ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('videos.show', $video) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                        <a href="{{ route('videos.edit', $video) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 mx-2">Edit</a>
                        <form action="{{ route('videos.destroy', $video) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    function confirmDelete(event) {
        event.preventDefault();
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
                event.target.submit();
            }
        });
    }

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function (e) {
            confirmDelete(e);
        });
    });
</script>
@endpush