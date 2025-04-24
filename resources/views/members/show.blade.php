@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold mb-2">Member Details</h1>
    </div>
</div>

<div class="flex flex-col md:flex-row gap-4 mb-4">
    <div class="w-80 h-120 border rounded overflow-hidden">
        @if ($member->file_profil)
        <img src="{{ asset('storage/' . $member->file_profil) }}" alt="Profile Photo" class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
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
        @switch($member->status)
        @case(1) Active @break
        @case(2) Inactive @break
        @case(3) Suspended @break
        @case(4) Terminated @break
        @default Unknown
        @endswitch
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

<a href="{{ route('members.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
@endsection