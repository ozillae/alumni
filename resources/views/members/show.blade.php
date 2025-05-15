@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold mb-2">Member Details</h1>
    </div>
</div>

<div class="flex flex-col md:flex-row gap-4 mb-4">
    <div class="w-80 h-120 border rounded overflow-hidden bg-gray-400">
        @if ($member->file_profil)
        <img src="{{ asset('member-files/' . $member->file_profil) }}" alt="Profile Photo" class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gray-400 text-white">
            No Photo
        </div>
        @endif
    </div>
    <div>
        <div class="mb-4 flex">
            <strong class="w-32">Code:</strong> {{ $member->code }}
        </div>
        @foreach (['Name' => 'name', 'Title Front' => 'title_front', 'Title Back' => 'title_back', 'Phone' => 'phone', 'Email' => 'email'] as $label => $field)
        <div class="mb-4 flex">
            <strong class="w-32">{{ $label }}:</strong> {{ $member->$field ?? '-' }}
        </div>
        @endforeach
    </div>
</div>
<div >
    @foreach (['Address' => 'address', 'City' => 'city', 'Province' => 'province', 'Division' => 'division'] as $label => $field)
    <div class="mb-4 flex">
        <strong class="w-32">{{ $label }}:</strong> {{ $member->$field }}
    </div>
    @endforeach
    <div class="mb-4 flex">
        <strong class="w-32">Status:</strong>
        {{ $member->textStatus($member->status) }}
    </div>
    <div class="mb-4 flex">
        <strong class="w-32">Joint Date:</strong> {{ $member->joint_date }}
    </div>
    <div class="mb-4 flex">
        <strong class="w-32">Description:</strong> {{ $member->description ?? '-' }}
    </div>
</div>

<div class="mb-6">
    <h2 class="text-xl font-bold mb-2">Portfolios</h2>
    @if ($portfolios->isEmpty())
    <p>No portfolios available.</p>
    @else
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                @foreach (['#', 'Title', 'Description', 'Institution'] as $header)
                <th class="border border-gray-300 px-4 py-2">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $portfolio)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $portfolio->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $portfolio->description }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $portfolio->institution }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<!-- Modal Trigger -->
<div class="mt-6">
    <a href="{{ route('members.index') }}"  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-500">Back</a>
    
    <button id="validateStatusButton" class="@if($member->status != '1') hidden @endif bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-500">Validate Status</button>
</div>

<!-- Modal -->
<div id="validateStatusModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-xl font-bold mb-4">Validate Member Status</h2>
        <p class="mb-4">Are you sure you want to approve or reject this member's status?</p>
        <div class="flex justify-end gap-4">
            <button id="closeModalButton" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            <form method="POST" action="{{ route('members.approve') }}">
                @csrf
                <input type="hidden" name="member" value="{{ $member->id }}">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Approve</button>
            </form>
            <form method="POST" action="{{ route('members.reject') }}">
                @csrf
                <input type="hidden" name="member" value="{{ $member->id }}">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Reject</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('validateStatusButton').addEventListener('click', function () {
        document.getElementById('validateStatusModal').classList.remove('hidden');
    });

    document.getElementById('closeModalButton').addEventListener('click', function () {
        document.getElementById('validateStatusModal').classList.add('hidden');
    });
</script>
@endsection