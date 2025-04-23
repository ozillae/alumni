@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Events</h1>
    <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Event</a>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Start Date</th>
                <th class="border border-gray-300 px-4 py-2">End Date</th>
                <th class="border border-gray-300 px-4 py-2">Location</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($events->currentPage() - 1) * $events->perPage() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $event->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $event->start_date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $event->end_date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $event->location }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('events.show', $event) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('events.edit', $event) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline delete-form">
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
        {{ $events->links() }}
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
