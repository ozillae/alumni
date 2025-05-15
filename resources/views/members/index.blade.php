@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Members</h1>
    <a href="{{ route('members.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Member</a>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('members.index') }}" class="mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="text" name="name" value="{{ request('name') }}" placeholder="Filter by Name" class="border border-gray-300 px-4 py-2 rounded">
            <input type="text" name="phone" value="{{ request('phone') }}" placeholder="Filter by Phone" class="border border-gray-300 px-4 py-2 rounded">
            <input type="email" name="email" value="{{ request('email') }}" placeholder="Filter by Email" class="border border-gray-300 px-4 py-2 rounded">
            <select name="division" class="border border-gray-300 px-4 py-2 rounded">
                <option value="">Filter by Division</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ request('division') == $division->id ? 'selected' : '' }}>
                        {{ $division->name }}
                    </option>
                @endforeach
            </select>

            <select name="status" class="border border-gray-300 px-4 py-2 rounded">
                <option value="">Filter by Status</option>
                @foreach ($listStatus as $k => $v)
                    <option value="{{ $k }}" {{ request('status') == $k ? 'selected' : '' }}>
                        {{ $v }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 text-right">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Filter</button>
            <a href="{{ route('members.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Reset</a>
        </div>
    </form>
    <!-- End Filter Form -->

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Phone</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($members->currentPage() - 1) * $members->perPage() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->textStatus($member->status) }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('members.show', $member) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('members.edit', $member) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline delete-form">
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
        {{ $members->links() }}
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
