@extends('layouts.member')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $memberPorto->title }}</h1>
    <div class="mb-6 text-gray-600">
        <p>Published on: {{ $memberPorto->created_at ? $memberPorto->created_at->format('F d, Y') : 'N/A' }}</p>
        <p>Institution: {{ $memberPorto->institution }}</p>
    </div>
    <div class="prose">
        <p>{{ $memberPorto->description }}</p>
    </div>
    <a href="{{ route('portofolio.index') }}" class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Portfolio List</a>
</div>
@endsection