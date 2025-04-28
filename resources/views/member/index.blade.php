@extends('layouts.member')

@section('content')
<div class="flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold mb-2">Detail Anggota</h1>
    </div>
</div>

<div class="flex flex-col md:flex-row gap-4 mb-4">
    <div class="w-80 h-120 border rounded overflow-hidden relative group">
        @if ($member->file_profil)
        <img src="{{ asset('member-files/'.$member->file_profil) }}" alt="Profile Photo" class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
            No Photo
        </div>
        @endif
        <a href="{{ route('member.uploadPhoto', 'code='.$member->code) }}" 
           class="absolute inset-0 bg-black bg-opacity-50 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            Upload Photo
        </a>
    </div>
    <div>
        <div class="mb-4 flex">
            <strong class="w-32">Code:</strong> {{ $member->code }}
        </div>
        @foreach (['Nama' => 'name', 'Gelar Depan' => 'title_front', 'Gelar Belakang' => 'title_back', 'Email' => 'email'] as $label => $field)
        <div class="mb-4 flex">
            <strong class="w-32">{{ $label }}:</strong> {{ $member->$field ?? '-' }}
        </div>
        @endforeach
        <div class="mb-4 flex">
            <strong class="w-32">Telepon:</strong> {{ displayPhoneNumber($member->phone) ?? '-' }}
        </div>
    </div>
</div>
<div>
    @foreach (['Address' => 'address', 'City' => 'dataCity.name', 'Province' => 'dataProvince.name', 'Division' => 'dataDivision.name'] as $label => $field)
    <div class="mb-4 flex">
        <strong class="w-32">{{ $label }}:</strong> {{ data_get($member, $field, '-') }}
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

<!-- <div class="mb-6">
    <h2 class="text-xl font-bold mb-2">Portfolios</h2>
    @if ($portofolios->isEmpty())
    <p>No portofolios available.</p>
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
            @foreach ($portofolios as $portfolio)
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
</div> -->
<div>
    <a href="{{ route('member.update') }}" class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Update Member</a>
</div>
@endsection